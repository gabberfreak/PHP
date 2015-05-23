<?php
$numbersString = $_GET['numbersString'];
$pattern = '/([A-Z][A-Za-z]*)[^0-9A-Za-z+]*([+]?[0-9]+[0-9\- \.\/\)\(]*[0-9]+)/';
preg_match_all($pattern, $numbersString, $matches);
if (empty($matches[1]) || empty($matches[2])) {
    echo "<p>No matches!</p>";
} else {
    $names = [];
    $phoneNumbers = [];
    $result = '<ol>';
    foreach ($matches[1] as $name) {
        $names[] = $name;
    }
    foreach ($matches[2] as $phone) {
        $newphone = preg_replace("/[\(\)\/\.\-\s]+/", "", $phone);
        $phoneNumbers[] = $newphone;
    }
    for ($i = 0,$j = 0; $i < count($names);$j++, $i++) {
        $currName = $names[$i];
        $currPhone = $phoneNumbers[$j];
        $result .= "<li><b>$currName:</b> $currPhone</li>";
    }
    echo $result . "</ol>";
}
?> 