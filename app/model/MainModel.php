<?php
namespace App\Model;
use Nette;

class MainModel extends \Nette\Object{


    private $database;
    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }


    public function findBy($table, $where) {
        return $this->database->table($table)->where($where);
    }

    public function findAll($data){
        return $this->database->table($data);
    }

    public function findOneId($table, $id) {
        return $this->database->table($table)->get($id);
    }

    public function findOneBy($table, array $by) {
        return $this->database->table($table)->limit(1)->fetch();
    }

    public function insert($table,array $data) {
        return $this->database->table($table)->insert($data);
    }

    public function update($table ,array $where,array $data){
        $this->database->table($table)->where($where)->update($data);
    }


    public function query($data){
        return $this->database->query($data);
    }



}