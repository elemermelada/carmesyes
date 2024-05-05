<?php
echo "1";
$device_id = $_GET['id'];
$port = $_GET['port'];
//$path = $_GET['path'];
echo "2";
require '../util/db.php';
$link = db_connect();

echo "3";
require '../util/queries.php';
$device = get_device($link, $device_id);

$url = "http://" . $device['ip'] . ":$port/?"

foreach($_GET as $key => $value){
    $url .= $key . "=" . $value . "&";
}

echo "4";
$result = file_get_contents($url);
echo "5";

$output = array("url"=>$url, "result"=>$result);
echo json_encode($output);
?>