<form action="" method="get">
    Enter cars <input type="text" name="cars" size="26"/>
    <button>Show result</button><br>
    <?php
        if (isset($_GET['cars'])) {
            $car = explode(", ",$_GET['cars']);
            $array = array_count_values($car);
            $colors = array('black', 'yellow' , 'red', 'green', 'blue', 'orange', 'purple', 'pink', 'white', 'brown', 'darkblue', 'lightgreen', 'darkred');
            $table = '<table border="1" cellpadding="2" style="margin: 5px 0 0 80px"><thead><tr><th>Car</th><th>Color</th><th>Count</th></tr></thead>';
            foreach ($array as $i => $value) {
                $table .= '<tr><td>' . ($i) . '</td><td>' . $colors[array_rand($colors)] . '</td><td>' . rand(1,5) . '</td></tr>';
            }
            echo $table;
        }
    ?>
</form>