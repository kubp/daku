<?php
namespace App\Model;
use Nette;

class Base{


    private $database;
    public function __construct(Nette\Database\Context $database)
    {
        $this->database = $database;
    }


    protected $where;
    protected $table;

    public function findBy(array $table, array $where) {


        return $this->database->table($table)->where($where);
    }


    public function findOne(array $by) {
        return $this->database->table($table)->limit(1)->fetch();
    }





}