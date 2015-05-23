<?php
    if(isset($_GET['text']) && isset($_GET['word'])){
        ?>
        <?php
            $text = $_GET['text'];
            $word = $_GET['word'];
            $splitted = preg_split('/(?<=[.,?!])\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
            foreach ($splitted as $sentence) {
                if (preg_match('/\\s+'. $word .'\\s+.*[!?.]+$/',$sentence)) {
                    echo $sentence . "<br>";
                }
            }
        ?>
<?php }
    else {
    ?>
        <form action="" method="get">
            <textarea name="text" id="textID" cols="35" rows="6"></textarea><br>
            <input type="text" name="word" style="margin-top: 5px; margin-bottom: 5px;"/>
            <button>Submit</button>
        </form>
<?php } ?>