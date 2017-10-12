<?php
if (file_exists('conf.local.php')) {
    require_once 'conf.local.php';
}

if (!defined('USER')) define('USER', 'admin');
if (!defined('PASSWORD')) define('PASSWORD', '123');
if (!defined('API_KEY')) define('API_KEY', 'smart_home_test');

if (!defined('DBNAME')) define('DBNAME', 'smart_home');
if (!defined('DBPASSWORD')) define('DBPASSWORD', 123456);
if (!defined('DBHOST')) define('DBHOST', 'localhost');
if (!defined('DBUSER')) define('DBUSER', 'root');
