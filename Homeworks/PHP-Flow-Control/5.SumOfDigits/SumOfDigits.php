<form action="" method="get">
    Input string: <input type="text" name="strings"/>
    <button>Submit</button><br>
    <?php
        if (isset($_GET['strings'])) {
            $parts = explode(", ", $_GET['strings']);
            $table = '<table border="1" style="margin-top: 5px">';
            for ($i = 0; $i < count($parts); $i++) {
                $curr = $parts[$i];
                $table .= '<tr><td>' .$curr . '</td>';
                $num = (int)$curr;
                if ($num == 0) {
                    $table .= '<td> ' . "I cannnot sum that" . '</td></tr>';
                } else {
                    $splitted = str_split($num);
                    $sum = 0;
                    for ($j = 0; $j < count($splitted); $j++) {
                        $current = (int)$splitted[$j];
                        $sum += $current;
                    }
                    $table .= '<td>' . $sum . '</td></tr>';
                }
            }
            echo $table;
        }
    ?>
</form>
