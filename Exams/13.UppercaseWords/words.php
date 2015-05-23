<?php
$text = htmlspecialchars($_GET['text']);
//    $text = htmlspecialchars('Companies like
//    HP, ORACLE and IBM target their platforms for cloud-based environment.
//    IList<T> implements IEnumerable<T>. GoPHP is a PHP5 library.
//');

$pattern = '/\b[A-Z0-9]+\b/';
preg_match_all($pattern, $text, $array);
$shit = $array[0];

function is_palindrome($string)
{
    $a = strtolower(preg_replace("/[^A-Z]/","",$string));
    return $a==strrev($a);
}

$replacements = [];

for ($i = 0; $i < count($array[0]); $i++) {
    $curr = $array[0][$i];
    if (is_palindrome($curr)) {
        $str = preg_split("/[^A-Z]/", $curr,-1,PREG_SPLIT_NO_EMPTY);
        $number = preg_split("/.*[^0-9]/", $curr, -1, PREG_SPLIT_NO_EMPTY);
        $palindrome = str_split($str[0]);
        $string = [];
        for ($j = 0; $j < count($palindrome); $j++) {
            $curr1 = $palindrome[$j];
            $string[] = $curr1;
            $curr2 = $palindrome[$j];
            $string[] = $curr2;
//                $lastIndex = count($palindrome) - 1;
            if (($j == count($palindrome) - 1) && (count($number) > 0)){
                $string[] = $number[0];
            }
        }
        $replacements[] = implode("", $string);
    }
    else {
        $replacements[] = strrev($curr);
    }
}
$manual = preg_replace_callback('/\b[A-Z0-9]+\b/', function($matches) use (&$replacements) {
    return array_shift($replacements);
}, $text);
echo "<p>$manual</p>";

?>