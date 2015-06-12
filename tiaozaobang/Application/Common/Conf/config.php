<?php
return array(
	//数据库连接参数
    'DB_TYPE' => 'mysql',     // 数据库类型
	'DB_HOST' => '127.0.0.1',	//数据库服务器地址
	'DB_USER' => 'root',	//数据库连接用户名
	'DB_PWD' => '123',	//数据库连接密码
	'DB_NAME' => 'tiaozaobang', //使用数据库名称
	'DEFAULT_MODULE'     => 'Home', //默认模块
    'URL_MODEL'          => '2', //URL模式
    'SESSION_AUTO_START' => true, //是否开启session
    
    'URL_PARAMS_BIND'       =>  true, // URL变量绑定到操作方法作为参数
	'URL_HTML_SUFFIX' => '',//伪静态后缀名
	
);
?>