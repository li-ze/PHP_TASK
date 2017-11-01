<?php
/**
 * The development database settings. These get merged with the global settings.
 */
// ローカルデータベースの設定
return array(
	'default' => array(
	    'type'  => 'mysqli',
		'connection'  => array(
			'hostname'   => 'localhost',
			'port'       => '3306',
			'database'   => 'php_task',
			'username'   => 'root',
			'password'   => 'uqsdr54s',

		),

		'identifier'     => '`',
	//	'profiling'  => 'true',
		'charset'        => 'utf8',
		'enable_cache'   => true,
		'profiling'      => false,
		'readonly'       => false,


	),


);
