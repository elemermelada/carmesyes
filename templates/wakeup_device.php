<div class='device_widget_wakeup_device_container'>
    <div class='device_widget_wakeup_device'>
        <div class='device_widget_wakeup_device_title'>
            <span class='device_widget_wakeup_device_name'>
                <?php echo $wakeup_device['name']; ?>
            </span>
            <?php echo ' (' . $wakeup_device['mac_address'] . ')'; ?>
        </div>
        <div class='device_widget_wakeup_device_button_container'>



            <button hx-get="routes/send_wakeup.php?id=<?php echo $wakeup_device['id']; ?>"
                hx-target="#wakeup_status_<?php echo $wakeup_device['id']; ?>" hx-swap="innerHTML">
                Send wakeup call
                <span id='wakeup_status_<?php echo $wakeup_device['id']; ?>'>?</span>
                <img class="htmx-indicator" width='10px'
                    src="https://www.superiorlawncareusa.com/wp-content/uploads/2020/05/loading-gif-png-5.gif">
            </button>
        </div>
    </div>
</div>