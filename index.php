<?php

if ($_GET['pass']=="lolaso") {

	file_put_contents('log', $_SERVER['REMOTE_ADDR'] . ", " . date("H:i d-m"));
	echo $_SERVER["REMOTE_ADDR"];

}
else if ($_GET['pass']=="lolmao") {

	file_put_contents('log2', $_SERVER['REMOTE_ADDR'] . ", " . date("H:i d-m"));
	echo $_SERVER["REMOTE_ADDR"];

}
else {
	
	$data = file_get_contents('log');
	$ip = substr($data,0,strpos($data,","));
	$time = substr($data,strpos($data,","));
	echo '<a href="http://' . $ip . '">' . $ip . '</a>' . $time . ' <br>';

	$data = file_get_contents('log2');
	$ip = substr($data,0,strpos($data,","));
	$time = substr($data,strpos($data,","));
	echo '<a href="http://' . $ip . '">' . $ip . '</a>' . $time . ' <br>';
	echo $_SERVER["REMOTE_ADDR"] . ", " . date("H:i d-m");
	
}

?>