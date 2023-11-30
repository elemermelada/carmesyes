<?php

$device_id = $_GET['id'];

require '../util/db.php';
require '../util/queries.php';

$link = db_connect();
$pinglog = get_device_pinglog($link, $device_id);

require '../templates/pinglog_widget.php';

?>