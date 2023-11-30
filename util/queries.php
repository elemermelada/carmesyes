<?php
function get_device_pinglog($link, $device_id, $limit = 100)
{
    $query = 'SELECT * FROM carmesyes_pinglog WHERE `device`=?';
    $request = $link->prepare($query);
    $request->bind_param('s', $device_id);
    $request->execute();
    $result = $request->get_result();

    $log_array = mysqli_fetch_all($result, MYSQLI_ASSOC);   // TODO - would love to only query the last $limit elements, but looks hard to do in SQL
    $size = count($log_array);

    return array_slice($log_array, $size - $limit);
}
?>