<?php
namespace App\Model;
use Nette;


class CategoryList extends MainModel{



    public function getAllCategory(){

        $categorydb = $this->findAll("category")->group("category_name");

        return $categorydb;
    }

    public $items;
    public function getAllItems($category){
        $a=5;
        $items=$this->queryBound("SELECT * FROM item JOIN category ON category_id=category.idcategory WHERE category_id=?",$category);
        return  $items;
    }

    public function getAllItemsBy($order,$category){
        $items=$this->queryBound("SELECT * FROM item JOIN category ON category_id=category.idcategory WHERE category_id=? ORDER by $order",$category);
        return  $items;
    }



}



