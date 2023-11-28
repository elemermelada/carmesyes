<?php

error_reporting(E_ALL);

// Connect to DB
$config = json_decode(file_get_contents("db_config.json"), true);
$host_name = $config['host_name'];
$database = $config['database'];
$user_name = $config['user_name'];
$password = $config['password'];
$link = new mysqli($host_name, $user_name, $password, $database);

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
$query = 'INSERT INTO `dbs12325432.carmesyes_pinglog` (`date`, `ip`, `device`) VALUES (CURRENT_TIME(), \'' . $device_ip . '\', \'' . $device_id . '\');';
$query = 'SELECT * FROM dbs12325432.carmesyes_devices';

$result = $link->query($query);
printf("Select returned %d rows.\n", $result->num_rows);

//mysqli_query($link, $query) or die(mysqli_error($link));


?>