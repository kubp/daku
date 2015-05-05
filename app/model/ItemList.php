<?php
namespace App\Model;
use Nette;
use Tracy\Debugger;

class ItemList extends MainModel{

	public $items;
	public function getAllItems(){
		$items=$this->findAll("item");
		return  $items;
	}

	public function getDetail($id){
		return $this->findOneId("item",$id);

	}

	public function buyItem($id, $cart){
		$exist = $this->findOneId("item",$id);

		if($exist) {
			$this->insert("list", array("item_id" => $id, "cart_id" => $cart));
		}

	}

	public function removeItem($id,$cart){
		$this->query("DELETE FROM list WHERE cart_id=$cart AND item_id=$id");
	}



}



