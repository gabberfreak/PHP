<?php
    $table = '<table border="1"><thead><tr><th>Number</th><th>Square</th></tr></thead>';
    $sum = 0;
    for ($i = 0; $i <= 100; $i+=2) {
        $square = round(sqrt($i), 2);
        $sum += $square;
        $table .= '<tr><td>' . ($i) . '</td><td>' . $square . '</td></tr>';
    }
    echo $table;
    echo '<tr><td>'. "<div style=\"font-weight: bold;\"> Total: " . '</td><td>' . $sum . '</td></tr>';
?>