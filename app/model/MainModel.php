<?php
namespace App\Model;
use Nette;

class MainModel extends \Nette\Object{


    private $database;
    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }


    public function findBy($table,$slc, $where) {
        return $this->database->table($table)->where($slc, $where);
    }

    public function findAll($data){
        return $this->database->table($data);
    }

    public function findOneId($table, $id) {
        return $this->database->table($table)->get($id);
    }





}