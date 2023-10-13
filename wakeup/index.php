<?php

$config = json_decode(file_get_contents("../config.json"), true);
$addr = $config['MAC_ADDR'];

$data = file_get_contents('../log');
$ip = substr($data,0,strpos($data,","));
$path = "tools/wake.php?addr=" . $addr;

$url = 'http://' . $ip . '/' . $path;
echo file_get_contents($url);

?>