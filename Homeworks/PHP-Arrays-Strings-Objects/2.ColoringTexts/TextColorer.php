<?php
    if (isset($_POST['text'])) {
       ?>
        <?php
        $text = $_POST['text'];
        $splittedString = str_replace(' ','',$text);
        $arr = str_split($splittedString);
        $result = '<div>';
        for ($i = 0; $i < count($arr); $i++) {
            $curr = $arr[$i];
            end($arr);
            $lastVal = key($arr);
            if (ord($curr) % 2 == 0) {
                if ($i == $lastVal) {
                    $result .= '<span style="color: red">' . $curr . '</span>';
                } else {
                    $result .= '<span style="color: red">' . $curr . " " . '</span>';
                }
            }
            if (ord($curr) % 2 == 1) {
                if ($i == $lastVal) {
                    $result .= '<span style="color: blue">' . $curr . '</span>';
                } else {
                    $result .= '<span style="color: blue">' . $curr . " ". '</span>';
                }
            }
        }
    ?>
    <?php echo $result ?>
<?php }
    else {
    ?>
        <form action="" method="post">
            <textarea name="text" id="textID" cols="30" rows="2 "></textarea><br>
            <button>Color text</button>
        </form>
<?php } ?>