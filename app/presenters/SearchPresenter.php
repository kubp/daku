<?php

namespace App\Presenters;

use Nette,
    App\Model;


/**
 * Search presenter.
 */
class SearchPresenter extends BasePresenter
{
    /** @var Model\ItemList */
    protected $search;


    public function injectModels(Model\Search $search)
    {
        $this->search = $search;
    }
    public function renderDefault($s)
    {
        if($s!="") {
            $this->template->items = $this->search->autocomplete($s);
            $this->template->search=$s;
        }else{
            $this->template->items = array();
        }


    }

    public function renderD($s)
    {
        if($s!="") {
            $this->template->items = $this->search->autocomplete($s);

        }else{
            $this->template->items = array();
        }


    }



}
