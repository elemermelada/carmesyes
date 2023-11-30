<?php

$wakeup_id = $_GET['id'];

require '../util/db.php';
$link = db_connect();
require '../util/queries.php';

$wakeup_device = get_wakeup_device($link, $wakeup_id);
$mac_address = $wakeup_device['mac_address'];

$device = get_device($link, $wakeup_device['device']);
$device_ip = $device['ip'];

$url = 'http://' . $device_ip . '/' . 'tools/wake.php?addr=' . $mac_address;

$status = '✔️';
http_response_code(200);
$ctx = stream_context_create(
    array(
        'http' => array(
            'timeout' => 5
        )
    )
);
$response = file_get_contents($url, 0, $ctx);

if (!$response) {
    $status = '❌';
    http_response_code(503);
}

echo $status;
exit();

?>