<?php
namespace App\Model;
use Nette;


class Access extends MainModel{


    public function insertAccess($user_agent,$ip_address,$user,$referer,$script){
        $this->insert("access",array("user_agent"=>$user_agent, "ip"=>$ip_address,"user"=>$user,"referer"=>$referer,"script"=>$script));

    }




}



