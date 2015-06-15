<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Cart presenter.
 */
class CartPresenter extends BasePresenter
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

    }



}
