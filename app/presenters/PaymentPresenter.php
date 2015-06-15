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


        $this->template->cart = $this->cartModel->getAllItems($this->context->cartsession->getCart());
        $this->template->total_price=$this->cartModel->getTotalPrice($this->context->cartsession->getCart());



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

        $this->cartModel->pay($this->getUser()->id, $this->context->cartsession->getCart(),$values['name'],
        $values['address'],$values['postal'],$values['shipping'],$values['zprava']);

        $user_mail=$this->context->settings->getAll($this->getUser()->id);
        //$user_mail->mail

        //echo "http://mail.edaku.eu/buy.php?email=".$user_mail->mail."";
        file_get_contents("http://mail.edaku.eu/buy.php?email=".$user_mail->mail."");


        $this->cartModel->removeCart($this->context->cartsession->getCart());

        $cart_id=$this->context->cart->noCart($this->getUser()->id);
        $this->context->cartsession->setCart($cart_id);

        $this->flashMessage('Děkujeme Vám za nákup', 'success');
        $this->redirect('Main:default');


        if($this->getUser()->id){
            $this->flashMessage('Byl jste úspěšně přihlášen', 'success');
        }

        //$this->redirect('Main:default');

    }

}
