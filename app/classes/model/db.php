<?php
return array(
    'default' => array(
        'type'           => 'pdo',
        'connection'  => array(
            'dsn' => 'mysql:host=localhost;dbname=php_test',
            'username'       => 'root',
            'password'       => 'root', // 設定したパスワード
            'persistent'     => false,
            'compress'       => false,
        ),
        'identifier'     => '`',
        'table_prefix'   => '',
        'charset'        => 'utf8',
        'enable_cache'   => true,
        'profiling'      => false,
        'readonly'       => false,
    ),
);