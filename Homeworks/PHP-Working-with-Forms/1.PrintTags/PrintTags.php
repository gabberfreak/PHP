<form action="" method="get">
    <p>Enter Tags:</p>
    <input type="text" name="tags"/>
    <button>Submit</button><br>
    <br>
    <?php
        if(isset($_GET['tags'])) {
            $pieces = explode(", ", $_GET['tags']);
            foreach ($pieces as $i => $value) {
                echo "$i : $pieces[$i] <br>";
            }
        }
    ?>
</form>

