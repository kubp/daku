<?php
namespace App\Model;
use Nette;


class CategoryList extends MainModel{

    public $category;
    public function getAll($category){

        $categorydb = $this->findBy("item",array("category"=>$category));

        return $categorydb;
    }



}



