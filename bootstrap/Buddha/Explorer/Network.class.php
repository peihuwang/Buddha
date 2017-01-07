<?php

class Buddha_Explorer_Network{
    protected static $_instance;
    /**
     * 实例化
     *
     * @static
     * @access	public
     * @return	object 返回对象
     */
    public static function getInstance($options)
    {
        if (self::$_instance === null) {
            $createObj=  new self();
            if (is_array($options))
            {
                foreach ($options as $option => $value)
                {
                    $createObj->$option = $value;
                }
            }
            self::$_instance =$createObj;
        }
        return self::$_instance;
    }
    public function __construct(){

    }

    /**
     * 获取访问者的ip
     * @static
     * @access	public
     * @return string
     **/

    public static function getIp() {
        $isagent = TRUE;
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $currentIP = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $currentIP = $_SERVER['HTTP_CLIENT_IP'];
        } else {
            $currentIP = $_SERVER['REMOTE_ADDR'];
            $isagent = FALSE;
        }
        $ip= array((preg_match('~[\d\.]{7,15}~', $currentIP, $match) ? $match[0] : 'unknow'), $isagent);
        return $ip[0];
    }

}