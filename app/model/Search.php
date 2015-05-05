<?php
namespace App\Model;
use Nette;


class Search extends MainModel{
    public function autocomplete($search){
       $dotaz= $this->query("SELECT * FROM item WHERE item_name LIKE '%$search%' or description LIKE '%$search%'");
        return $dotaz;
    }




}