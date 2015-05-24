<?php
namespace App\Model;
use Nette, Nette\Security;


class Register extends MainModel{
    public function register($name, $mail, $password){
        $this->insert("customer",array("name"=>$name, "mail"=>$mail,
            "password"=>Nette\Security\Passwords::hash($password)));


    $cart=$this->findBy("customer",array("mail"=>$mail))->limit(1)->fetch();

        $this->insert("cart",array("customer_id"=>$cart, "paid"=>"false",
          "date"=>time()));
    }

    public function checkRegister($mail){
        return $this->findAll("customer")->where("mail=?",$mail)->limit(1)->fetch();



    }



}