<?php
$text = $_GET['text'];
$blacklist = $_GET['blacklist'];

//    $text = 'Hi, I\'m an air-conditioner technician, so if you need any assistance you can contact me at air-conditioners@gmail.com . Secondary email: kinky_technician@yahoo.in or at naked-screwdriver@abv.bg OR pesho@dir.tk';
//    $blacklist = '*.bg
//pesho@dir.tk
//*.com';

$list = preg_split("/\r?\n/", $blacklist, -1, PREG_SPLIT_NO_EMPTY);
$pattern = "/[a-zA-Z\d\+\_\-]+\@[a-zA-Z\d\-]+\.[a-zA-Z\d\-\.]+/";
preg_match_all($pattern, $text, $array);
$replacements = [];
$foundMatched = false;
for ($i = 0; $i < count($array[0]); $i++) {
    $curr = $array[0][$i];
    for ($j = 0; $j < count($list); $j++) {
        $curr2 = $list[$j];
        $matchList = preg_split("/\*/", $curr2, -1, PREG_SPLIT_NO_EMPTY);
        $matchList = $matchList[0];
        preg_match("/.*(\.[a-zA-Z\d\-\.]+)/", $curr, $string);
        if ($string[1] == $matchList) {
            $replacements[] = str_repeat("*",strlen($curr));
            $foundMatched = true;
            break;
        } else if ($curr == $curr2) {
            $replacements[] = str_repeat("*",strlen($curr));
            $foundMatched = true;
            break;
        } else {
            $foundMatched = false;
        }
    }
    if ($foundMatched == false) {
        $replacements[] = '<a href="mailto:'. $curr . '">'. $curr . '</a>';
    }
}

$manual = preg_replace_callback('/[a-zA-Z\d\+\_\-]+\@[a-zA-Z\d\-]+\.[a-zA-Z\d\-\.]+/', function($matches) use (&$replacements) {
    return array_shift($replacements);
}, $text);
echo "<p>" . $manual . "</p>";
?> 