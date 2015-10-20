<?php
return array(
	//'配置项'=>'配置值'
	//数据库设置
	'DB_TYPE'      =>'mysql',//数据库类型
	'DB_HOST'      =>'127.0.0.1',//服务器地址
	'DB_NAME'      =>'tp_kmpeople',//数据库名
	'DB_USER'      =>'root',//数据库用户名
	'DB_PWD'       =>'root',//数据库密码
	'DB_PREFIX'    =>'tp_',//数据库表前缀

	//调试页面Trace
	'SHOW_PAGE_TRACE' => true,
	//URL地址不区分大小写
	'URL_CASE_INSENSITIVE'=> true,
	//类库
	'AUTOLOAD_NAMESPACE' =>array(
		'Lib' => APP_PATH.'Lib',
		),
	'URL_HTML_SUFFIX' => '',//HTML扩展名
	//模板相关配置
	'TMPL_PARSE_STRING'=>array(
		'__Public__' => __ROOT__.'/Public',
		'__Css__' => __ROOT__.'/Public/css',
		'__Js__' => __ROOT__.'/Public/js',
		'__Image__'=>__ROOT__.'/Public/image'
		),
	// 'TMPL_ACTION_ERROR'     =>  APP_PATH.'Home/Tpl/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    // 'TMPL_ACTION_SUCCESS'   =>  APP_PATH.'Home/Tpl/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
    // 'TMPL_EXCEPTION_FILE'   =>  APP_PATH.'Home/Tpl/think_exception.tpl',// 异常页面的模板文件
);