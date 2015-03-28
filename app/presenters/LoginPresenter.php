<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;


/**
 * Homepage presenter.
 */
class LoginPresenter extends BasePresenter
{


    public function renderDefault($item)
    {

        if($this->getUser()->id){
        $this->redirect("Main:default");
            }
    }

    protected function createComponentPrihlaseniForm()
    {
        $form = new Form;

        $form->addText('name', 'E-mail')
            ->setRequired("Jméno je povinné");


        $form->addPassword('password', 'Heslo:')->setRequired("Heslo je povinne");


        $form->addSubmit('send', 'Login');
        $form->onSuccess[] = array($this, 'commentFormSucceeded');
        return $form;
    }


    public function commentFormSucceeded($form, $values)
    {

        try {
            $this->getUser()->login($values["name"], $values["password"]);

        } catch (Nette\Security\AuthenticationException $e) {
            $this->flashMessage('Špatný login nebo heslo', 'bad');
        }

        //$this->redirect('Main:default');

    }

}
