<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class MainPresenter extends BasePresenter
{
    /** @var Model\ItemList */
    protected $ItemListModel;


    public function injectModels(Model\ItemList $ItemListModel)
    {
        $this->ItemListModel = $ItemListModel;
    }
    public function renderDefault()
    {
        $this->template->logged = false;
        $data=$this->ItemListModel->getAllItems();
        $this->template->items = $data;
        if($this->getUser()->isLoggedIn()){
            $this->template->logged = true;
        }

    }



}
