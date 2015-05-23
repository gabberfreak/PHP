<?php
$size = intval($_GET['size']);
$text = $_GET['text'];
//
//    $size = 4;
//    $text = 'Rvioes roi tset ';

$matrix   = Array();
$used = Array();

for ($j = 0; $j < $size; $j++) {
    $matrix[$j] = Array();
    for ($i = 0; $i < $size; $i++) {
        $matrix[$j][$i] = '-';
    }
}

for ($j = -1; $j <= $size; $j++) {
    $used[$j] = Array();
    for ($i = -1; $i <= $size; $i++) {
        if ($i == -1 || $i == $size || $j == -1 || $j == $size) {
            $used[$j][$i] = true;
        }
        else {
            $used[$j][$i] = false;
        }
    }
}

$n = 0;
$i = 0;
$j = 0;
$direction = 0; // 0 - left, 1 - down, 2 - right, 3 - up
while (true) {
    $matrix[$j][$i] = $text[$n++];
    $used[$j][$i] = true;

    switch ($direction) {
        case 0:
            $i++;
            if ($used[$j][$i]) {
                $i--;
                $j++;
                $direction = 1;
            }
            break;
        case 1:
            $j++;
            if ($used[$j][$i]) {
                $j--;
                $i--;
                $direction = 2;
            }
            break;
        case 2:
            $i--;
            if ($used[$j][$i]) {
                $i++;
                $j--;
                $direction = 3;
            }
            break;
        case 3:
            $j--;
            if ($used[$j][$i]) {
                $j++;
                $i++;
                $direction = 0;
            }
            break;
    }

    if ($used[$j][$i]) {
        break;
    }
}

$strings = '';
for ($r = 0; $r < $size; $r++) {
    $strings .= implode("",$matrix[$r]);
    if ($size % 2 == 0) {
        $strings .= "|";
    }
}

$whites = '';
$blacks = '';

for ($i = 0; $i < strlen($strings); $i++) {
    if ($i % 2 == 0) {
        $whites .= $strings[$i];
    } else {
        $blacks .= $strings[$i];
    }
}
$concatenated = str_replace("|","",$whites . $blacks);

$toCheck = preg_replace("/[^a-zA-z]*/","", $concatenated);

$color = '#E0000F';
$isPalindrome = strtolower($toCheck) == strrev(strtolower($toCheck));
if ($isPalindrome) {
    $color = '#4FE000';
}

echo "<div style='background-color:$color'>" . htmlspecialchars($concatenated) ."</div>";
?> 