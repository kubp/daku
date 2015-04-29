<?php
namespace App\Model;
use Nette, Nette\Security;


class Register extends MainModel{
    public function register($name, $mail, $password){
       $user_key=md5($name.$mail);
        $user_key=substr($user_key,0,8);
        $this->insert("customer",array("name"=>$name, "mail"=>$mail,
            "password"=>Nette\Security\Passwords::hash($password),"login_key"=>$user_key));

    }




}