<?php

namespace App\Presenters;

use Nette,
    Nette\Application\UI\Form,
    App\Model;


/**
 * Payment presenter.
 */
class PaymentPresenter extends BasePresenter
{
    /** @var Model\Cart */
    protected $cartModel;
    public function injectModels(Model\Cart $cartModel)
    {
        $this->cartModel = $cartModel;
    }

    public function renderDefault()
    {

        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Login:default');
        }

        $this->template->cart = $this->cartModel->getAllItems($this->getUser()->getIdentity()->data[0]);
        $this->template->total_price=$this->cartModel->getTotalPrice($this->getUser()->getIdentity()->data[0]);



    }

    protected function createComponentPaymentForm()
    {
        $paymentmethod=array("PPL","DHL","Česká pošta","Vyzvednout");

        $form = new Form;

        $form->addText('name', 'Jméno a příjmení')->setRequired("Jméno je povinné")
            ->addRule(Form::MIN_LENGTH, "Krátké jméno",4);
        $form->addText('address', 'Adresa')->setRequired("Adresa je povinná")
        ->addRule(Form::MIN_LENGTH, "Je to opravdu Vaše adresa?",8);
        $form->addText('postal', 'PSČ')
            ->addRule(Form::PATTERN, "PSČ musí mít 5 číslic",'([0-9]\s*){5}')
            ->setRequired("Směrovací číslo je povinné");
        $form->addSelect('shipping', 'Výběr doručení',$paymentmethod)->setRequired("Vyberte prosím doručení");


        $form->addTextArea('zprava', 'Chcete se na něco zeptat?');
        $form->addSubmit('send', 'Zaplatit objednávku');
        $form->onSuccess[] = array($this, 'paymentFormSucceeded');
        return $form;
    }


    public function paymentFormSucceeded($form, $values)
    {

        $this->cartModel->pay($this->getUser()->id, $this->getUser()->getIdentity()->data[0],$values['name'],
        $values['address'],$values['postal'],$values['shipping'],$values['zprava']);

        $this->flashMessage('Děkujeme Vám za nákup', 'success');
        $this->redirect('Main:default');

        /*
        if($this->getUser()->id){
            $this->flashMessage('Byl jste úspěšně přihlášen', 'success');
        }
        */
        //$this->redirect('Main:default');

    }

}
