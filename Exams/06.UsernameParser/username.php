<?php
$list = $_GET['list'];
$length = intval($_GET['length']);
$show = strtolower($_GET['show']);

//    $list = 'Angel
//Ivancho
//Aha
//Toni
//Pesho
//Gosho';
//    $length = intval('5');
//    $show = strtolower('On');

$strings = preg_split("/\r?\n/", $list, -1, PREG_SPLIT_NO_EMPTY);
$result = '<ul>';
foreach ($strings as $username) {
    if (($show == 'on') && (strlen($username) < $length)) {
        $result .= '<li style="color: red;">'. htmlspecialchars($username).  '</li>';
    } else if (($show != 'on') && (strlen($username) < $length)) {
        continue;
    } else {
        $result .= '<li>' . htmlspecialchars($username) . '</li>';
    }
}
echo $result . '</ul>';
?>