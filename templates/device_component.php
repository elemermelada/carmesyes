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
    <div class='device_widget'>
        <img height='250px' src='https://upload.wikimedia.org/wikipedia/commons/d/da/Purple_flower_(4764445139).jpg'>
    </div>
</div>