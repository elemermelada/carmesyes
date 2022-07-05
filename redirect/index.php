<?php

$data = file_get_contents('../log');
$ip = substr($data,0,strpos($data,","));
$path = $_GET['path'];

if ($ip==$_SERVER['REMOTE_ADDR']) {
	$ip='192.168.0.4';
}

echo '<meta http-equiv="refresh" content="0;url=http://' . $ip . '/' . $path . '">';

?>