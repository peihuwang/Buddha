<?php
define('PATH_ROOT', str_replace('\\', '/', substr((dirname(__FILE__)), 0, -9)));
require_once PATH_ROOT.'bootstrap/Buddha/Buddha.class.php';
Buddha::getInstance()
    ->init()
    ->import('Vendor.smarty.Smarty')
    ->startup();
?>