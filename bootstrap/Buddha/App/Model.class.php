<?php

/**
 * Class Buddha_App_Model
 */
class Buddha_App_Model{
    protected $db;
    protected $prefix;
    protected $classname;
    protected $table;

    public function __construct(){
        $this->db=Buddha_Driver_Db::getInstance(
            Buddha::getDatabaseConfig()
        );
        $this->prefix=$this->db->getPrefix();
    }
    public  function insert(){
       return  $this->db->insert($this->table, array(
            "user_name" => "foo",
            "email" => "foo@bar.com",
            "type" => "business",
            "age" => "134"
        ));
    }




}