<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class ItemPresenter extends BasePresenter
{


    public function renderDefault($item,  $itemname)
    {
        $data=$this->context->item->getDetail($item);
        $this->template->items = $data;
        if($this->getUser()->isLoggedIn()){
            $this->template->logged = true;
        }else{
            $this->template->logged = false;
        }

    }

    public function renderBuy($id)
    {
        if (!$this->getUser()->isLoggedIn()) {
            $this->flashMessage('Musíte se přihlásit', 'success');
            $this->redirect('Item:default',$id,"as");
        }else{

            $this->context->item->buyItem($id, $this->getUser()->getIdentity()->data[0]);


            $this->flashMessage('Děkujeme za nákup', 'success');
            $this->redirect('Item:default',$id,"as");
        }
    }


    public function renderRemove($id){
        if (!$this->getUser()->isLoggedIn()) {
            $this->error('Musíte se přihlásit');
        }else{

            $this->context->item->removeItem($id, $this->getUser()->getIdentity()->data[0]);
            $this->redirect("Cart:default");

            //$this->flashMessage('Děkujeme za nákup', 'success');
            //$this->redirect('Item:default',$id,"as");
        }
    }

}
