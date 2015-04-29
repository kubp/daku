<?php
namespace App\Model;
use Nette;


class CategoryList extends MainModel{

    public $category;
    public function getAll($category){

        $categorydb = $this->findBy("item",array("category"=>$category));

        return $categorydb;
    }

    public function getAllCategory(){

        $categorydb = $this->query("SELECT category FROM item GROUP by category");

        return $categorydb;
    }



}



