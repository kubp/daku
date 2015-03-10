<?php
namespace App\Model;
use Nette;


class ItemList{

	private $items;
	private function get(){
		  $this->items = array("batoh","skrin","zead","mas");
		  return  $this->items;
	}
	public function data(){
		$this->items = array("batoh","skrin","zead","mas");
		return  $this->items;
	}

}



