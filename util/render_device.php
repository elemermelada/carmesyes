<?php
function render_device($device, $render_widget, $widget_args)
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

    include __DIR__ . '/../templates/device_component.php';
}
?>