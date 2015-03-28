<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;

use Tracy\Debugger;
/**
 * Homepage presenter.
 */
class RegisterPresenter extends BasePresenter
{


    public function renderDefault($item)
    {
        $this->template->item = $item;

    }

    protected function createComponentRegistraceForm()
    {
        $form = new Form;

        $form->addText('name', 'Jméno')
            ->setRequired("Jméno je povinné")
            ->addRule(Form::MIN_LENGTH, 'Jméno musí mít minimálně %d znaků', 5)
            ->addRule(Form::MAX_LENGTH, 'Maximalni delka je %d znaků', 150);

        $form->addText('email', 'E-mail')
            ->setRequired("Jméno je povinné")
            ->addRule(Form::MAX_LENGTH, 'Maximalni delka je %d znaků', 100)
            ->addRule(Form::EMAIL, 'Váš email nebyl zadán spávně.');


        $form->addPassword('password', 'Heslo:')->setRequired("Heslo je povinne")
            ->addRule(Form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaky', 6)
            ->addRule(Form::MAX_LENGTH, 'Maximalni delka je %d znaků', 100);

        $form->addSubmit('send', 'Registrovat se');
        $form->onSuccess[] = array($this, 'commentFormSucceeded');
        return $form;
    }


    public function commentFormSucceeded($form, $values)
    {
        //Debugger::dump($values);
        $this->context->register->register($values["name"],$values["email"],$values["password"]);
        $this->flashMessage('Děkujeme za registraci', 'success');
        $this->redirect('Main:default');



    }

}
