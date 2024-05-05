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

$result = file_get_contents($url);

//$output = array("url"=>$url, "result"=>$result);
echo json_encode($result);
?>