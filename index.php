<?php

// error_reporting(0);
require './util/render_device.php';
require './util/render_pinglog.php';
require './util/queries.php';

// Connect to DB
require './util/db.php';
$link = db_connect();

// Fetch all the devices
$query = 'SELECT * FROM carmesyes_devices';
$result = $link->query($query);
$devices = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Render all devices
echo '<link rel="stylesheet" href="assets/main.css">
<script type="text/javascript" src="assets/main.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
<body onload="reactive_ui()" style="background-color:#eeeeee;">';

echo '<div class="main_container">';
foreach ($devices as $device) {
	$pinglog = get_device_pinglog($link, $device['id']);
	render_device($device, 'render_pinglog', $pinglog);
}
echo '</div>';
?>