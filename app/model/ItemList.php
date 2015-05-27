<?php
namespace App\Model;
use Nette;
use Tracy\Debugger;

class ItemList extends MainModel{

	public $items;
	public function getAllItems(){
		$items=$this->query("SELECT * FROM item JOIN category ON category_id=category.idcategory");
		return  $items;
	}

	public function getAllItemsBy($order){
		$items=$this->query("SELECT * FROM item JOIN category ON category_id=category.idcategory ORDER by $order");
		return  $items;
	}

	public function getDetail($id){
		return $this->findOneId("item",$id);

	}

	public function buyItem($id, $cart,$quantity){
		$exist = $this->findOneId("item",$id);

		if($exist) {
			$this->insert("list", array("item_id" => $id, "cart_id" => $cart,"quantity"=>$quantity));
		}


	}

	public function descItem($id,$quantity){

		$count = $this->findOneId("item",$id);
		//echo $count->in_stock;
		if( $count->in_stock>=$quantity) {
			$this->update("item", array("item_id" => $id), array("in_stock" => $count->in_stock-$quantity));
			return true;
		}else{
			return false;
		}

	}



	public function removeItem($id,$cart){
		$this->query("DELETE FROM list WHERE cart_id=$cart AND item_id=$id");
	}



}



