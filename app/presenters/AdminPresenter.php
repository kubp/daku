<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class AdminPresenter extends BasePresenter
{

    protected function beforeRender()
    {
        parent::beforeRender();
        $this->setLayout('layoutAdmin');
    }
    public function renderDefault()
    {
        if(isset($this->getUser()->getIdentity()->data[0])){
            $this->template->a="logged";
        }else{
            $this->flashMessage('Pravděpodobně nemáte oprávnění :(', 'error');
            $this->redirect('Main:');
        }

        $date=$this->context->admin->getAccessList();
        $this->template->datum=$date;

        $lastaccess=$this->context->admin->getAccessLast();
        $this->template->lastaccess=$lastaccess;

    }

    /** @var Model\ItemList */
    protected $ItemListModel;
    public function injectModels(Model\ItemList $ItemListModel)
    {
        $this->ItemListModel = $ItemListModel;
    }

    public function renderItem(){
        $data=$this->ItemListModel->getAllItems();
        $this->template->data=$data;

        if(!isset($this->getUser()->getIdentity()->data[0])){
            $this->flashMessage('Pravděpodobně nemáte oprávnění :(', 'error');
            $this->redirect('Main:');
        }
    }


    public function renderCustomers(){
        $this->template->users=$this->context->admin->getCustomers();
        if(!isset($this->getUser()->getIdentity()->data[0])){
            $this->flashMessage('Pravděpodobně nemáte oprávnění :(', 'error');
            $this->redirect('Main:');
        }
    }

    public function renderOrder()
    {
        $this->template->orders = $this->context->admin->getOrders();

        if(!isset($this->getUser()->getIdentity()->data[0])){
            $this->flashMessage('Pravděpodobně nemáte oprávnění :(', 'error');
            $this->redirect('Main:');
        }
    }





}
