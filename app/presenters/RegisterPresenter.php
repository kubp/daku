<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;


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

        $form->addText('names', 'E-mail')
            ->setRequired("Jméno je povinné");


        $form->addText('name', 'E-mail')
            ->setRequired("Jméno je povinné")

            ->addRule(Form::EMAIL, 'Váš email nebyl zadán spávně.');

        $form->addPassword('password', 'Heslo:')->setRequired("Heslo je povinne")
            ->addRule(Form::MIN_LENGTH, 'Heslo musí mít alespoň %d znaky', 3);

        $form->addSubmit('send', 'Login');
        $form->onSuccess[] = array($this, 'commentFormSucceeded');
        return $form;
    }


    public function commentFormSucceeded($form, $values)
    {
        $this->template->name=$values->name;
        $this->template->pass=$values->password;


        //$this->redirect('Main:default');

        //$this->flashMessage('Děkuji za komentář', 'success');
        //$this->redirect('this');
    }

}
