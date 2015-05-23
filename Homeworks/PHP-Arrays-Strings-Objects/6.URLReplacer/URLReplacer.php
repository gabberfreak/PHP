<?php
    if (isset($_GET['text'])) {
    ?>
    <?php
        $text = $_GET['text'];
        $new_text = preg_replace("/<a href=(.*?)>(.*?)<\\/a>/", "[URL=$1]$2[/URL]", $text);
    ?>
    <?php echo $new_text ?>
<?php }
    else {
    ?>
        <form action="" method="get">
            <textarea name="text" id="textID" cols="40" rows="6" style="margin-bottom: 5px;"></textarea><br>
            <button>Submit</button>
        </form>
<?php } ?>