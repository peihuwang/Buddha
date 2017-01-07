<?php
require_once dirname(__FILE__) . '/bootstrap/Init.php';


//初始化工厂对象
$factory = new Buddha_Validator_Factory(new Buddha_Validator_Translator);

//验证
$rules = array(
    'username' => 'required|min:5',
    'password' => 'required|min:3|confirmed',
    'password_confirmation' => 'required|min:3'
);

$input = array(
    'username' => '12345',
    'password' => '222222',
    'password_confirmation' => '222222'
);
$validator = $factory->make($input, $rules);

//判断验证是否通过
if ($validator->passes()) {
    echo 'pass';
    //通过
} else {
    //未通过
    //输出错误消息
    print_r($validator->messages()); // 或者 $validator->errors();
}

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/12/22
 * Time: 9:34
 */
/*
require  'medoo.php';
$database = new BuddhaDatabase(array(
    // 必须配置项
    'database_type' => 'mysql',
    'database_name' => 'edm',
    'server' => 'localhost',
    'username' => 'edm',
    'password' => 'edm',
    'charset' => 'utf8',


    // 可选参数
    'port' => 3306,

    // 可选，定义表的前缀
    'prefix' => 'b2b_',

    // 连接参数扩展, 更多参考 http://www.php.net/manual/en/pdo.setattribute.php
    'option' => array(
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    )
));

$database->debug()->insert("account", array(
    "user_name" => "foo",
    "email" => "foo@bar.com",
    "type" => "business",
    "age" => "15"
));


$database->insert("account", array(
    "user_name" => "foo",
    "email" => "foo@bar.com",
    "type" => "business",
    "age" => "15"
));


$database->delete("account", array(
    "AND" => array(
        "type" => "business",
        "age[<]" => 18
    )
));
*/