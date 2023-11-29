<?php
function db_connect()
{

    $config = json_decode(file_get_contents(__DIR__ . "/../db_config.json"), true);
    $host_name = $config['host_name'];
    $database = $config['database'];
    $user_name = $config['user_name'];
    $password = $config['password'];

    $link = new mysqli($host_name, $user_name, $password, $database);

    if ($link->connect_error) {
        return null;
    }

    return $link;
}
?>