<?php

error_reporting(E_ALL);

// Connect to DB
require '../db.php';
$link = db_connect();

// Grab parameters
$device_id = $_GET['id'];
$device_ip = $_SERVER['REMOTE_ADDR'];
$date = new DateTime();

// TODO - implement better SQL injection prevention measures??
if (!is_numeric($device_id)) {
    http_response_code(400);
    exit();
}

// Perform request
$query = 'INSERT INTO `carmesyes_pinglog` (`date`, `ip`, `device`) VALUES (CURRENT_TIME(), \'' . $device_ip . '\', \'' . $device_id . '\');';
$result = $link->query($query);
$result->close();

?>