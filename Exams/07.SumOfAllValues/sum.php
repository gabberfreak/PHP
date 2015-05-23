<?php
$keyStr = $_GET['keys'];
$textStr = $_GET['text'];

//    $keyStr = 'st*rt1234567890end';
//    $textStr = 'zsertytujhmnfgdstjyituityrategfdnvbmjkio8ukhgjfhgdreyurytdkhgmnbfdgrtrydtiuoyiljkhmngbfgdatreyuydjkghmnbxfdgre';
preg_match("/^([a-zA-z_]+)[0-9]+.*[0-9]+([[a-zA-z_]+)/", $keyStr, $keyPattern);
if (empty($keyPattern)) {
    echo "<p>A key is missing</p>";
} else {
    $start = $keyPattern[1];
    $end = $keyPattern[2];
    preg_match_all("/($start)(.*?)($end)/", $textStr, $text);
    $numbers = [];
    for ($i = 0; $i < count($text[2]); $i++) {
        $curr = trim($text[2][$i]);
        if (is_numeric($curr)) {
            $numbers[] = $curr;
        } else {
            continue;
        }
    }
    if (empty($numbers)) {
        echo "<p>The total value is: <em>nothing</em></p>";
    } else {
        $sum = 0;
        for ($j = 0; $j < count($numbers); $j++) {
            $sum += floatval($numbers[$j]);
        }
        echo "<p>The total value is: <em>$sum</em></p>";
    }

}
?>