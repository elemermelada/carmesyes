<?php

$config = json_decode(file_get_contents("../config.json"));
$addr = $config['MAC_ADDR'];

$data = file_get_contents('../log');
$ip = substr($data,0,strpos($data,","));
$path = "tools/wake.php?addr=" . $addr;

if ($ip==$_SERVER['REMOTE_ADDR']) {
	$ip='192.168.0.4';
}

echo '<meta http-equiv="refresh" content="0;url=http://' . $ip . '/' . $path . '">';

?>