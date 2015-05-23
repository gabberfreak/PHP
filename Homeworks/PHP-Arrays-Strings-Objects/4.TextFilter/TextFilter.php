<?php
    if(isset($_GET['text']) && isset($_GET['ban'])) {
    ?>
    <?php
        $text = $_GET['text'];
        $banlist = $_GET['ban'];
        $banns = explode(', ',$banlist);
        for ($i = 0; $i < count($banns); $i++) {
            $replacement = str_repeat("*", strlen($banns[$i]));
            $text = preg_replace("/($banns[$i])/", $replacement, $text);
        }
        echo $text;
    ?>

<?php }
    else {
    ?>
        <form action="" method="get">
            <textarea name="text" id="textID" cols="35" rows="6"></textarea><br>
            <input type="text" name="ban" style="margin-top: 5px; margin-bottom: 5px;"/>
            <button>Filter</button>
        </form>
<?php } ?>