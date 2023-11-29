<div class='device_container'>
    <div class='device_info'>
        <div class='device_name'>
            <?php echo $name; ?>
            <div class='status_indicator_container'>
                <div class='status_indicator' style='background-color:<?php echo $status ?>;'></div>
            </div>
        </div>
        <div class='device_ip'>
            <?php echo '<a href="http://' . $ip . '">' . $ip . '</a>'; ?>
            <button onclick='navigator.clipboard.writeText("<?php echo $ip; ?>");'>Copy</button>
        </div>
        <div class='time_container'>
            <span class='device_last'>
                <?php echo 'Last pinged: <code>' . $last_ping . '</code>'; ?>
            </span>
            <span class='device_ago'>
                <?php echo '<i>(' . $ago . ' minutes ago)</i>'; ?>
            </span>
        </div>
        <span></span>
    </div>
    <?php call_user_func($render_widget, $widget_args) ?>
</div>