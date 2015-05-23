<?php
if (isset($_GET['text']) && isset($_GET['hashValue']) && isset($_GET['fontSize']) && isset($_GET['fontStyle'])) {
    $text = $_GET['text'];
    $hashValue = intval($_GET['hashValue']);
    $fontSize = $_GET['fontSize'];
    $style = $_GET['fontStyle'];
    $string = str_split($text);
    $result = '<p style="font-size:' . $fontSize . ';';
    if ($style == "normal" || $style == "italic") {
        $result .= 'font-style:' . $style . ';">';
    } else {
        $result .= 'font-weight:' . $style . ';">';
    }
    for ($i = 0; $i < count($string); $i++) {
        $curr = $string[$i];
        if ($i % 2 == 0) {
            $next_character = chr(ord($curr) + $hashValue);
            $result .= $next_character;
        } else {
            $next_character = chr(ord($curr) - $hashValue);
            $result .= $next_character;
        }
    }
    echo $result . "</p>";
}
?> 