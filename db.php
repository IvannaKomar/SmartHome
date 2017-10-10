<?php

$dsn = "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];


$pdo = new PDO($dsn, DBUSER, DBPASSWORD, $opt);