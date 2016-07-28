<?php
return array(
    'TMPL_PARSE_STRING'=> array('__PUBLIC__' =>   __ROOT__.'/'.APP_PATH.'/'.MODULE_NAME.'/Tpl/Public',),
    'URL_HTML_SUFFIX'=>'',
    //数据库连接
    'DB_TYPE'=>'mysql',
    'DB_HOST'=>'localhost',
    'DB_USER'=>'root',
    'DB_PWD'=>'123456',
    'DB_NAME'=>'ad_manager',
    'DB_PREFIX'=>'ad_',
    'DB_DEBUG'  =>  TRUE,
    //自定义SESSION 数据库储存
    'SESSION_TYPE'=>'Db',
    'SESSION_OPTIONS'=>array('SESSION_AUTO_START' =>true,'use_trans_sid'=>1,'use_only_cookies'=>0),
    //url模式
    'URL_MODEL'=>2,
    //修改定界符
    'TMPL_L_DELIM'=>'<{',
    'TMPL_R_DELIM'=>'}>',


);