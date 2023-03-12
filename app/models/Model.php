<?php

namespace App\Models;


class Model{
    public $table;

    private $db;

    public function __construct(){
        $this->db = $GLOBALS['db'];
    }

    public function insert($datas){
        return $this->db->insert($this->table,$datas);
    }

    public function select($items='*',$sql=''){
        if(not_empty($sql)) $sql = ' '.$sql;

        return $this->db->select('SELECT '.$items.' FROM '.$this->table.$sql);
    }

    public function update($datas,$where){
        return $this->db->update($this->table,$datas,$where);
    }

    public function delete($where){
        return $this->db->delete($this->table,$where);
    }

    public function __destruct(){
        unset($this->db);
    }
}

?>