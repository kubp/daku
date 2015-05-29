<?php
namespace App\Model;
use Nette;

class MainModel extends \Nette\Object{


    private $database;
    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }


    protected function findBy($table, $where) {
        return $this->database->table($table)->where($where);
    }

    protected function findAll($data){
        return $this->database->table($data);
    }

    protected function findOneId($table, $id) {
        return $this->database->table($table)->get($id);
    }

    protected function findOneBy($table, array $by) {
        return $this->database->table($table)->limit(1)->fetch();
    }

    protected function insert($table,array $data) {
        return $this->database->table($table)->insert($data);
    }

    protected function update($table ,array $where,array $data){
        $this->database->table($table)->where($where)->update($data);
    }


    protected function query($data){
        return $this->database->query($data);
    }



}