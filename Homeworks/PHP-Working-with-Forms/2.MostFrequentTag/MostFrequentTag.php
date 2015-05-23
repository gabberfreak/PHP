<form action="" method="get">
    <p>Enter Tags:</p>
    <input type="text" name="tags"/>
    <button>Submit</button><br>
    <br>
    <?php
        if(isset($_GET['tags'])) {
            $pieces = explode(", ", $_GET['tags']);
            $array = array_count_values($pieces);
            $maxValue = array_search(max($array),$array);
            arsort($array);
            foreach ($array as $i => $value) {
                echo "$i : $value times <br>";
            }
            echo "<p>Most Frequent Tag is: $maxValue</p>";
        }
    ?>
</form>