<?php

return [
	'template'               => [
		// 模板路径
		'view_path'    => ROOT_PATH.'tpl'.DS."admin".DS,
		'view_depr'    => "_",
	],
	//替换输出
	'view_replace_str'  =>  [
		'__PUBLIC__'=> '/static',
		'__IMG__' => '/static/admin/img',
		'__JS__' => '/static/admin/js',
		'__CSS__' => '/static/admin/css',
	]
];

?>