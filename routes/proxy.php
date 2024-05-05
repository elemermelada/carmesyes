<?php
$device_id = $_GET['id'];
$port = $_GET['port'];

require '../util/db.php';
$link = db_connect();

require '../util/queries.php';
$device = get_device($link, $device_id);

$url = "http://" . $device['ip'] . ":$port/?";
foreach($_GET as $key => $value){
    $url .= $key . "=" . $value . "&";
}

$content = file_get_contents("php://input");

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => $content
    )
);
$context  = stream_context_create($opts);

$result = file_get_contents($url);
echo $result;
?>