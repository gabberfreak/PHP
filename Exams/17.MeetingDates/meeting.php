<?php
date_default_timezone_set('Europe/Sofia');
$dateOne = $_GET['dateOne'];
$dateTwo = $_GET['dateTwo'];

$start = strtotime($dateOne);
$end = strtotime($dateTwo);

$dates = [];
if ($start <= $end) {
    for ($i = strtotime('Thursday',$start); $i <= $end; $i = strtotime('+1 week',$i)) {
        $curr = date("d-m-Y",$i);
        $dates[] = $curr;
    }
} else {
    for ($i = strtotime('Thursday',$end); $i <= $start; $i = strtotime('+1 week',$i)) {
        $curr = date("d-m-Y",$i);
        $dates[] = $curr;
    }
}

if (count($dates) == 0) {
    echo '<h2>No Thursdays</h2>';
} else {
    $output = '<ol>';
    for ($i = 0; $i < count($dates); $i++) {
        $currentDate = $dates[$i];
        $output .= '<li>' . $currentDate . '</li>';
    }
    echo $output . '</ol>';
}
?> 