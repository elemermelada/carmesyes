<?php
function get_device_pinglog($link, $device_id, $limit = 100)
{
    $query = 'SELECT * FROM carmesyes_pinglog WHERE `device`=? LIMIT ?';
    $request = $link->prepare($query);
    $request->bind_param('ss', $device_id, $limit);
    $request->execute();
    $result = $request->get_result();
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>