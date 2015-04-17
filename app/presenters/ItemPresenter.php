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


    }

    public function renderBuy($id)
    {
        if (!$this->getUser()->isLoggedIn()) {
            $this->error('Musíte se přihlásit');
        }else{

            $this->context->item->buyItem($id, $this->getUser()->getIdentity()->data[0]);


            //$this->flashMessage('Děkujeme za nákup', 'success');
            //$this->redirect('Item:default',$id,"as");
        }
    }

}
