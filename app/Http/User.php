<?php
class User extends  Buddha_App_Model{
    public function __construct(){
       parent::__construct();
       $this->table = strtolower(__CLASS__);

    }


public  function insert(){
$this->db->insert("account", array(
"user_name" => "foo",
"email" => "foo@bar.com",
"type" => "business",
"age" =>111
));
}






}