<?php
function db_connect()
{

    $config = json_decode(file_get_contents("db_config.json"), true);
    $host_name = $config['host_name'];
    $database = $config['database'];
    $user_name = $config['user_name'];
    $password = $config['password'];

    $link = new mysqli($host_name, $user_name, $password, $database);

    if ($link->connect_error) {
        die('<p>Error al conectar con servidor MySQL: ' . $link->connect_error . '</p>');
    } else {
        echo '<p>Se ha establecido la conexión al servidor MySQL con éxito.</p>';
    }

    return $link;
}
?>