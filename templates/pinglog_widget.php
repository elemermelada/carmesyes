<div id='widget_<?php echo $device_id; ?>' class='device_widget device_widget_pinglog'>
    <code>
        <?php
        foreach ($pinglog as $entry) {
            echo $entry['date'] . ': ' . $entry['ip'] . "<br/>";
        }
        ?>
    </code>
</div>