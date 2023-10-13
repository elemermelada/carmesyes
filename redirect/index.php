<?php

$config = json_decode(file_get_contents("../config.json"), true);
$data = file_get_contents('../log');
$ip = substr($data,0,strpos($data,","));
$path = $_GET['path'];

if ($ip==$_SERVER['REMOTE_ADDR']) {
	$ip=$config['LOCAL_IP'];
}

echo '<meta http-equiv="refresh" content="0;url=http://' . $ip . '/' . $path . '">';

?>