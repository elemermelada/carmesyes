<?php

// Connect to DB
require '../util/db.php';
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

// Insert entry in log
$query = 'INSERT INTO `carmesyes_pinglog` (`date`, `ip`, `device`) VALUES (CURRENT_TIME(),?,?);';
$request = $link->prepare($query);
$request->bind_param('ss', $device_ip, $device_id);
$result = $request->execute();

// Result was false -> probably tried to add the same entry twice or used wrong ID
if ($result === false) {
    echo 'SQL Request error (1)';
    http_response_code(400);
    exit();
}

// Now update values in device table
$query = 'UPDATE `carmesyes_devices` SET `ip` = ?, `last_ping` = CURRENT_TIME() WHERE `id` = ?;';
$request = $link->prepare($query);
$request->bind_param('ss', $device_ip, $device_id);
$result = $request->execute();

// Result was false :(
if ($result === false) {
    echo 'SQL Request error (2)';
    http_response_code(400);
    exit();
}

echo 'Success';
http_response_code(200);
exit();

?>