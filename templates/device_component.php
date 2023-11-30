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
        <div class='widget_selector'>
            <button hx-get="routes/pinglog_widget.php?id=<?php echo $device_id; ?>"
                hx-target="#widget_<?php echo $device_id; ?>" hx-swap="outerHTML">
                Pinglog
                <img class="htmx-indicator" width='10px'
                    src="https://www.superiorlawncareusa.com/wp-content/uploads/2020/05/loading-gif-png-5.gif">
            </button>
            <button hx-get="routes/wakeup_widget.php?id=<?php echo $device_id; ?>"
                hx-target="#widget_<?php echo $device_id; ?>" hx-swap="outerHTML">
                Wakeup
                <img class="htmx-indicator" width='10px'
                    src="https://www.superiorlawncareusa.com/wp-content/uploads/2020/05/loading-gif-png-5.gif">
            </button>
            <!-- </br>
            <button style='margin:auto;' hx-post="/routes/pinglog_widget.php?id=1" hx-target="#widget"
                hx-swap="outerHTML">
                Register!
                <img class="htmx-indicator" width='10px'
                    src="https://www.superiorlawncareusa.com/wp-content/uploads/2020/05/loading-gif-png-5.gif">
            </button> -->
        </div>
    </div>
    <?php call_user_func($render_widget, $widget_args, $device_id) ?>
</div>