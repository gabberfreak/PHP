<?php
$arrows = $_GET['arrows'];
$arrows1 = $_GET['arrows1'];
$arrows2 = $_GET['arrows2'];
$arrows3 = $_GET['arrows3'];

$hay = array(
    $arrows,
    $arrows1,
    $arrows2,
    $arrows3
);


if (!empty($hay)) {
    $small = 0;
    $medium = 0;
    $large = 0;
    foreach ($hay as $arrow) {
        preg_match_all("/[\>]{1,3}-----[\>]{1,2}/", $arrow,$strings);
        if (empty($strings)) {
            break;
        } else {
            foreach ($strings[0] as $string) {
                if ($string == '>----->') {
                    $small++;
                } else if ($string == '>>----->' || $string == '>>>----->' || $string == '>>----->>') {
                    $medium++;
                } else if ($string == '>>>----->>' ){
                    $large++;
                } else {
                    continue;
                }
            }
        }
    }
    $count = strval($small) . strval($medium) . strval($large);
    $count = intval($count);
    $binaryFirst = decbin($count);
    $reversed = strrev($binaryFirst);
    $concatenate = $binaryFirst . $reversed;
    $decValue = bindec($concatenate);
    echo $decValue;
}
?>