<?php
return array(
	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE'       =>true, 
	'TMPL_PARSE_STRING'  =>array( 
	   '__PUBLIC__' => SITE_URL.'Application/Public', // 更改默认的/Public 替换规则 
     ),
    'DB_TYPE'               =>  '',     // 数据库类型
    'DB_HOST'               =>  '', // 服务器地址
    'DB_NAME'               =>  '',          // 数据库名
    'DB_USER'               =>  '',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
);