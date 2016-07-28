<?php
return array(
	'TMPL_PARSE_STRING'=> array('__PUBLIC__' =>   __ROOT__.'/'.APP_PATH.'/'.MODULE_NAME.'/Tpl/Public',),
	'URL_HTML_SUFFIX'=>'',

	//数据库连接
	'DB_HOST'=>'localhost',
	'DB_USER'=>'root',
	'DB_PWD'=>'123456',
	'DB_NAME'=>'ad_manager',
	'DB_PREFIX'=>'ad_',

	//自定义SESSION 数据库储存
	'SESSION_TYPE'=>'Db',
	'RBAC_SUPERADMIN'=>'admin',
	'ADMIN_AUTH_KEY'=>'superadmin',     //超级管理员识别
	'USER_AUTH_ON'=>true,
	'USER_AUTH_TYPE'=>1,
	'USER_AUTH_KEY'=>'uid',
	'NOT_AUTH_MODULE'=>'Index',                //无需认证的控制器
	'NOT_AUTH_ACTION'=>'logout,addUserHandle,addRolehandle,addNodeHandle,access,setAccess,delHandle',
	'RBAC_ROLE_TABLE'=>'ad_role',
	'RBAC_USER_TABLE'=>'ad_role_user',
	'RBAC_ACCESS_TABLE'=>'ad_access',
	'RBAC_NODE_TABLE'=>'ad_node',


);