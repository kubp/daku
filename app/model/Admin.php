<?php
namespace App\Model;
use Nette;


class Admin extends MainModel{


    public function getAccessList(){
        $dotaz=$this->query("SELECT DATE_FORMAT( date, '%d-%m' ) AS datum, count( * ) AS navsteva
FROM access
WHERE MONTH( date ) = MONTH( date )
GROUP BY datum")->fetchAll();
        return $dotaz;
    }

    public function getCustomers(){
        $dotaz=$this->findAll("customer")->fetchAll();
        return $dotaz;
    }

    public function getAccessLast(){
        $dotaz=$this->query("SELECT * FROM access
WHERE MONTH( date ) = MONTH( date ) LIMIT 25")->fetchAll();
        return $dotaz;
    }

    public function getOrders(){
        $dotaz=$this->query("SELECT customer.name AS email,date,transaction.name,address,shipping,joined
 FROM transaction JOIN customer ON transaction.customer_id=customer.customer_id")->fetchAll();
        return $dotaz;
    }

}



