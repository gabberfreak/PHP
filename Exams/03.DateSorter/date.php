<?php

date_default_timezone_set("Europe/Sofia");

$list = $_GET['list'];
$currDate = $_GET['currDate'];

$currDate = date_create($currDate);
$dates = preg_split("/\r?\n/", $list, -1, PREG_SPLIT_NO_EMPTY);
$arr = [];
foreach ($dates as $i) {
    $cur = date_create($i);
    if (!$cur) {
        continue;
    }
    $formattedDate = date_format($cur, 'd-m-Y');
    $arr[] = $formattedDate;
}

usort($arr, function($a, $b) {
    $ad = new DateTime($a);
    $bd = new DateTime($b);

    if ($ad == $bd) {
        return 0;
    }

    return $ad > $bd ? 1 : -1;
});

$result = '<ul>';
foreach ($arr as $date) {
    $curr = date_create($date);
    if ($curr < $currDate) {
        $result .= '<li><em>' . date_format($curr, 'd/m/Y'). '</em></li>';
    } else if ($curr >= $currDate) {
        $result .= '<li>' .date_format($curr, 'd/m/Y') .'</li>';
    }
}
echo $result . '</ul>';

?> 