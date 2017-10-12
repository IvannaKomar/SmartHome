<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require 'db.php';

if ($_GET['key'] !== API_KEY) {
    die('Auth Error');
} 
$pins = $pdo->query("SELECT * FROM devices")->fetchAll();
$response = array();
foreach ($pins as $pin) {
    $response['pins'][$pin['number']] = $pin['state'];
}


if (isset($_GET['temp'])) {
    $temp = filter_var($_GET['temp'], FILTER_SANITIZE_NUMBER_INT);
    $pdo->query("INSERT INTO temperatures SET value = '{$temp}' , create_date = NOW();");
} 


echo json_encode($response);