<div class='device_container'>
    <div class='device_info'>
        <span class='device_name'>
            <?php echo $name; ?>
        </span>
        <div class='device_ip'>
            <?php echo '<a href="http://' . $ip . '">' . $ip . '</a>'; ?>
            <button onclick='navigator.clipboard.writeText("<?php echo $ip; ?>");'>Copy</button>
        </div>
        <span class='device_last'>
            <?php echo 'Last pinged: <code>' . $last_ping . '</code>'; ?>
        </span>
        <span class='device_ago'>
            <?php echo '<i>(' . $ago . ' minutes ago)</i>'; ?>
        </span>
        <span></span>
    </div>
    <div class='device_widget'>
        <img height='250px' src='https://upload.wikimedia.org/wikipedia/commons/d/da/Purple_flower_(4764445139).jpg'>
    </div>
</div>