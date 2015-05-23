<?php
    if (isset($_POST['text'])) {
        ?>
        <?php
            $text = strtolower($_POST['text']);
            $words = preg_split('/[^aA-zZ0-9]+/', $text,-1,PREG_SPLIT_NO_EMPTY);
            $table = '<table border="1" style="background-color: #d2d2d2">';
            $frequencies = array_count_values($words);
            foreach ($frequencies as $word => $value) {
                $table .= '<tr><td>' . $word . '</td><td>' . $value . '</td></tr>';
            }
        ?>
        <?php echo $table; ?>
<?php }
    else {
    ?>
        <form action="" method="post">
            <textarea name="text" id="textID" cols="60" rows="3"></textarea><br>
            <button>Count words</button>
        </form>
<?php } ?>