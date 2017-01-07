<?php

class Buddha_Tool_File extends Buddha_Base_Component{
    /**
     * Buddha_Tool_File Instance
     *
     * @var Buddha_Tool_File
     */
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
    /**
     * 构造
     *
     */
    public function __construct(){

    }


    /**
     * 获取文件后缀
     * @static
     * @access	public
     * @return string 返回字符串
     **/
    public static function fileExtenttion($filename){
        return strtolower(trim(substr(strrchr($filename, '.'), 1)));
    }
    /**
     * 列出文件目录返回数组
     *
     * @static
     * @access	public
     * @param	string $uri 文件目录位置
     * @param	string  $var  遍历目录位置
     * @param	array  $type  遍历的文件后缀语序数组 例如array('php')就是遍历后缀是.php的文件
     * @return	array 返回数组
     */
    public static function listFile($uri,$var, $type = array()) {
        $rt = array();
        if (is_dir($var)) {

            $rs = @opendir($var);

            while (($file = readdir($rs)) !== FALSE) {
                if ($file != '..' && $file != '.') {
                    if ($type && in_array(Buddha_Tool_File::fileExtenttion($file), $type)){

                        $rt[substr($file,0,strrpos($file, '.'))] = $uri.$file;
                    }
                }
            }


            return $rt;
        }
        return FALSE;
    }

    /**
     * 导出excel
     *
     * @static
     * @access	public
     * @param	string $filename 导出文件名
     * @param	string  $strdata  导出的数据字符串
     * @return	string 返回字符串
     */
    public static  function exportExcel($filename,$strdata) {
        header("Content-Type: application/vnd.ms-execl");
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition`: attachment; filename=".$filename);
        header("Pragma: no-cache");
        header("Expires: 0");
        return $strdata;
    }



}