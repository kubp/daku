<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form;


/**
 * Homepage presenter.
 */
class LoginPresenter extends BasePresenter
{


    public function renderDefault()
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
            $this->flashMessage('Špatný login nebo heslo', 'error');
        }
        if($this->getUser()->id){
                $cart_id=$this->context->cart->noCart($this->getUser()->id);
                $this->context->cartsession->setCart($cart_id);


            $this->flashMessage('Byl jste úspěšně přihlášen', 'success');
        }

        //$this->redirect('Main:default');

    }

}
