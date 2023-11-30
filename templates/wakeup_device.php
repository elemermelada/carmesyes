<div class='device_widget_wakeup_device_container'>
    <div class='device_widget_wakeup_device'>
        <div class='device_widget_wakeup_device_title'>
            <span class='device_widget_wakeup_device_name'>
                <?php echo $wakeup_device['name']; ?>
            </span>
            <?php echo ' (' . $wakeup_device['mac_address'] . ')'; ?>
        </div>
        <div class='device_widget_wakeup_device_button_container'>
            <button style='margin:auto;'>Send wakeup call</button>
        </div>
    </div>
</div>