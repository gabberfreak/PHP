<?php
    $N = 1234;
    $number = (int)$N;
    $arr = array();

    if($number <= 100) {
        echo "no";
    }

    for ($i = 99; $i <= $number; $i++) {
        $firstDigit = (int)($i / 100);
        $secondDigit = (int)(($i / 10) % 10);
        $thirdDigit = (int)($i % 10);
        if (($firstDigit == $secondDigit) || ($secondDigit == $thirdDigit) || ($firstDigit == $thirdDigit)) {
            if ($i >= 1000) {
                break;
            }
            continue;
        }
        array_push($arr,$i);
    }

    echo implode (', ',$arr);
?>