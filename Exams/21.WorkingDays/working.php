<?php
date_default_timezone_set('Europe/Sofia');
$dateOne = $_GET['dateOne'];
$dateTwo = $_GET['dateTwo'];
$holidays = $_GET['holidays'];

$holidayStrings = preg_split("/\r?\n/", $holidays,-1,PREG_SPLIT_NO_EMPTY);
$start = strtotime($dateOne);
$end = strtotime($dateTwo);
$result = [];
while ($start <= $end) {
    if ($start > $end) {
        continue;
    }
    if ((date('N', $start) <= 5) && (!in_array(date('d-m-Y', $start),$holidayStrings))) {
        $current = date('d-m-Y', $start);
        $result[] = $current;
    }
    $start += 86400;
}
if (count($result) == 0) {
    echo '<h2>No workdays</h2>';
}  else {
    $output = "<ol>";
    for ($i = 0; $i < count($result); $i++) {
        $curr = $result[$i];
        $output .= '<li>'. $curr . '</li>';
    }
    echo $output .= '</ol>';
}

?> 