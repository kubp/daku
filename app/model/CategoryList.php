<?php
namespace App\Model;
use Nette;


class CategoryList extends MainModel{

    public $category;
    public function getAll($category){

        $categorydb = $this->findBy("item",array("category.idcategory"=>$category));

        return $categorydb;
    }

    public function getAllCategory(){

        $categorydb = $this->findAll("category")->group("category_name");

        return $categorydb;
    }



}



