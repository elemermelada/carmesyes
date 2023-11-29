<?php

error_reporting(0);

// Connect to DB
require './db.php';
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
<body onload="reactive_ui()" style="background-color:eeeeee;">';

echo '<div class="main_container">';
foreach ($devices as $device) {
	render_device($device);
}
echo '</div>';
function render_device($device)
{
	$name = $device['name'];
	$ip = $device['ip'];
	$last_ping = $device['last_ping'];
	$ago = floor(abs(strtotime("now") - strtotime($last_ping)) / 60);

	// Get endpoint status
	$status = 'green';
	$ctx = stream_context_create(
		array(
			'http' => array(
				'timeout' => 2
			)
		)
	);
	$response = file_get_contents("http://" . $ip, 0, $ctx);

	if (!$response) {
		$status = 'red';
	}

	include './templates/device_component.php';
}

?>