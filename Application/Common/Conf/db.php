<?php
return array(
	//'配置项'=>'配置值'
    /* 调试设定 */
    	'SHOW_PAGE_TRACE'        =>false,   // 显示页面Trace信息
//	'SHOW_RUN_TIME'=>true,          // 运行时间显示
//	'SHOW_ADV_TIME'=>true,          // 显示详细的运行时间
//	'SHOW_DB_TIMES'=>true,          // 显示数据库查询和写入次数
//	'SHOW_CACHE_TIMES'=>true,       // 显示缓存操作次数
//	'SHOW_USE_MEM'=>true,           // 显示内存开销
//	'SHOW_LOAD_FILE' =>true,   // 显示加载文件数
//	'SHOW_FUN_TIMES'=>true ,  // 显示函数调用次数


    /* 数据库设置 */
    'DB_TYPE'               => 'mysql',     // 数据库类型
	'DB_HOST'               => '127.0.0.1', // 服务器地址
	'DB_NAME'               => 'ts',          // 数据库名
	'DB_USER'               => 'root',      // 用户名
	'DB_PWD'                => '123456',          // 密码
	'DB_PORT'               => '3306',        // 端口
	'DB_PREFIX'             => 'treesys_',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    => false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       => true,        // 启用字段缓存
    'DB_CHARSET'            => 'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        => 0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        => false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         => 1, // 读写分离后 主服务器数量
    'DB_SQL_BUILD_CACHE'    => true, // 数据库查询的SQL创建缓存
    'DB_SQL_BUILD_QUEUE'    => 'file',   // SQL缓存队列的缓存方式 支持 file xcache和apc
    'DB_SQL_BUILD_LENGTH'   => 20, // SQL缓存的队列长度
	
	'VAR_PAGE'    =>'p',  //分页参数
);
?>
