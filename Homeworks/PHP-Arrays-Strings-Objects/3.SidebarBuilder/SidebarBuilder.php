<?php function printSidebar($header, $list) {
    ?>
    <?php
        $content = '<div style="width: 200px; background: #C1D2EA; border: solid 1px #000; border-radius: 30px; padding-left: 10px; margin-bottom: 20px;"><h2>'. $header. '</h2><hr/><ul>';
        $elements = explode(', ', $list);
        foreach ($elements as $element) {
            $content .= '<li style="list-style-type: circle; margin-bottom: 5px; text-decoration: underline">' . $element . '</li>';
        }
        echo $content . '</ul></div>';
    ?>
<?php } ?>

<?php
    if (isset($_POST['Categories']) && isset($_POST['Tags']) && isset($_POST['Months'])) {
        ?>
    <?php
        foreach ($_POST as $header => $list) {
            if($header !== 'submit') {
                printSidebar($header,$list);
            }
        }
        ?>
<?php }
    else {
    ?>
        <form action="" method="post">
            <label for="categories">Categories: </label>
            <input type="text" name="Categories" style="margin-bottom: 5px"/><br>

            <label for="tags">Tags: </label>
            <input type="text" name="Tags" style="margin-bottom: 5px"/><br>

            <label for="months">Months: </label>
            <input type="text" name="Months" style="margin-bottom: 5px"/><br>
            <button>Generate</button>
        </form>
<?php } ?>