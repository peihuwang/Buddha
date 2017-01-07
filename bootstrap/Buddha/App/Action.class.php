<?php

class Buddha_App_Action
{
    protected $db;
    protected $prefix;
    protected $smarty;
    protected $classname;

    public function __construct()
    {
        $this->db = Buddha_Driver_Db::getInstance(
            Buddha::getDatabaseConfig()
        );
        $this->prefix = $this->db->getPrefix();
        $this->smarty = Smarty::getInstance(
            Buddha::getSmartyConfig()
        );
        $this->classname = __CLASS__;
    }



}