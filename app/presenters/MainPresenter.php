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
    public function renderDefault($sort_by)
    {

        $data=$this->ItemListModel->getAllItems();
        switch ($sort_by) {
            case "title":
                $data=$this->ItemListModel->getAllItemsBy("item_name");
                break;
            case "price-asc":
                $data=$this->ItemListModel->getAllItemsBy("price DESC");
                break;
            case "price-desc":
                $data=$this->ItemListModel->getAllItemsBy("price ASC");
                break;
        }



        $category = $this->context->category->getAllCategory();
        $this->template->category=$category;


        $this->template->items = $data;
        if($this->getUser()->isLoggedIn()){
            $this->template->logged = true;
        }else{
            $this->template->logged = false;
        }

    }



}
