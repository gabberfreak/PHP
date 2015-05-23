<?php
    $getMonth = date('M');
    $getYear = date('Y');
    function getSundays($y, $m) {
        return new DatePeriod(
            new DateTime ("first sundays of $y-$m"),
            DateInterval::createFromDateString('next sunday'),
            new DateTime("last day of $y-$m")
        );
    }

    foreach (getSundays($getYear,$getMonth) as $sunday) {
        echo $sunday->format("jS F,Y\n");
    }
?>