<?php

$device_id = $_GET['id'];

require '../util/db.php';
require '../util/queries.php';

$link = db_connect();
$wakeup_devices = get_device_wakeup_devices($link, $device_id);

require '../templates/wakeup_widget.php';

?>