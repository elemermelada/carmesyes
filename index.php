<?php

if ($_GET['pass']=="lolaso") {

	file_put_contents('log', $_SERVER['HTTP_X_FORWARDED_FOR'] . ", " . date("H:i d-m"));

}
else {
	
	$data = file_get_contents('log');
	$ip = substr($data,0,strpos($data,","));
	$time = substr($data,strpos($data,","));
	echo '<a href="http://' . $ip . '">' . $ip . '</a>' . $time . ' <br>';
	echo $_SERVER["HTTP_X_FORWARDED_FOR"] . ", " . date("H:i d-m");
	
}

?>