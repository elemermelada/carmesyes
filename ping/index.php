<?php

error_reporting(E_ALL);

// Connect to DB
require '../db.php';
$link = db_connect();

// Grab parameters
$device_id = $_GET['id'];
$device_ip = $_SERVER['REMOTE_ADDR'];
$date = new DateTime();

// Return error on invalid input
if (!is_numeric($device_id)) {
    http_response_code(400);
    echo 'Invalid device ID';
    exit();
}

// Perform DB request
$query = 'INSERT INTO `carmesyes_pinglog` (`date`, `ip`, `device`) VALUES (CURRENT_TIME(),?,?);';
$request = $link->prepare($query);
$request->bind_param('ss', $device_ip, $device_id);
$result = $request->execute();

// Parse result
if ($result === true) {
    http_response_code(200);
    echo 'Success';
    exit();
}

// Result was false -> probably tried to add the same entry twice
echo 'SQL Request error';
http_response_code(400);
exit();

?>