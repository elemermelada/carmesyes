<div id='widget_<?php echo $device_id; ?>' class='device_widget device_widget_wakeup'>
    <?php
    foreach ($wakeup_devices as $wakeup_device) {
        include 'wakeup_device.php';
    }
    ?>
</div>