<?php
namespace App\Model;
use Nette;


class ItemList extends MainModel{

	public $items;
	public function getAllItems(){
		$items=$this->findAll("item");
		return  $items;
	}

	public function getDetail($id){
		return $this->findOneId("item",$id);

	}

}



