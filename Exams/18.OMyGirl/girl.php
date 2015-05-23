<?php
//    $text = 'a-.885O,a745#"F5Sofa7#"FFF5a
//1#"D5ia, a000#"FFF5a88887#"F532 a123457#"F5a7   #"FGDGSDG
//5G.S.a#"5 ma-5.55gghja-.885y8
//hgja#"F5Rakoa#"F5a5#"F5vsa9#"F5ghhjkuu867885a7#"FYIYUHUI5ki  a7#"FUIO5 a9997#"F5Stra#"5gia-5.558dft.8.8.a60-6.05hu-h-0yuua-.885rla-5.55yuti-..uioa-.885!a-5.55
//';
//    $key = 'a7#"F5';
$text = $_GET['text'];
$key = $_GET['key'];
$keySplitted = str_split($key);
$keyFirst = $keySplitted[0];
$keyLast = end($keySplitted);
$pattern = "/(($keyFirst)[0-9\r?\n]*[^a-zA-Z0-9]*[a-zA-Z]*($keyLast))(.{2,6})(($keyFirst)[0-9\r?\n]*[^a-zA-Z0-9]*[a-zA-Z]*($keyLast))/m";
preg_match_all($pattern, $text, $matches);
$result = [];
for ($i = 0; $i < count($matches[4]); $i++) {
    $curr = $matches[4][$i];
    $result[] = $curr;
}
echo implode("", $result);
?>