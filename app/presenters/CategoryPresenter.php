<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class CategoryPresenter extends BasePresenter
{
    /** @var Model\ItemList */
    protected $CategoryListModel;


    public function injectModels(Model\CategoryList $CategoryListModel)
    {
        $this->CategoryListModel = $CategoryListModel;
    }
    public function renderDefault($id,$category_name,$sort_by)
    {

        $data=$this->CategoryListModel->getAllItems($id);
        switch ($sort_by) {
            case "title":
                $data=$this->CategoryListModel->getAllItemsBy("item_name",$id);
                break;
            case "price-asc":
                $data=$this->CategoryListModel->getAllItemsBy("price DESC",$id);
                break;
            case "price-desc":
                $data=$this->CategoryListModel->getAllItemsBy("price ASC",$id);
                break;
        }

        if ($this->getUser()->isLoggedIn()) {

            $cart_items=$this->context->cart->itemsInCart($this->getUser()->getIdentity()->data[0]);;
            $this->template->cart=$cart_items;

        }

        $category = $this->context->category->getAllCategory();

        $this->template->category=$category;


        $this->template->id=$id;
        $this->template->category_name=$category_name;

        $this->template->items = $data;
        if($this->getUser()->isLoggedIn()){
            $this->template->logged = true;
        }else{
            $this->template->logged = false;
        }

    }



}
