<?php
$device_id = $_GET['id'];
$path = $_GET['path'];

require '../util/db.php';
$link = db_connect();

require '../util/queries.php';
$device = get_device($link, $device_id);

header('Location: http://' . $device['ip'] . '/' . $path);
?>