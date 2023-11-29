<div class='device_widget' style='overflow: scroll;'>
    <code>
        <?php
        foreach ($pinglog as $entry) {
            echo $entry['date'] . ': ' . $entry['ip'] . "<br/>";
        }
        ?>
    </code>
</div>