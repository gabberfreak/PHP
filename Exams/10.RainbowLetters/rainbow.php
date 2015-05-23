<?php
if (isset($_GET['text']) && isset($_GET['red']) && isset($_GET['green']) && isset($_GET['blue']) && isset($_GET['nth'])) {
    $red = intval($_GET['red']);
    $green = intval($_GET['green']);
    $blue = intval($_GET['blue']);

    $red = dechex($red<0?0:($red>255?255:$red));
    $green = dechex($green<0?0:($green>255?255:$green));
    $blue = dechex($blue<0?0:($blue>255?255:$blue));

    $color = (strlen($red) < 2?'0':'').$red;
    $color .= (strlen($green) < 2?'0':'').$green;
    $color .= (strlen($blue) < 2?'0':'').$blue;

    $array = str_split($_GET['text']);
    $result = '<p>';
    for ($i = 0; $i < count($array); $i++) {
        $curr = htmlspecialchars($array[$i]);
        if (($i + 1) % intval($_GET['nth']) == 0) {
            $result .= '<span style="color: #'. $color . '">'. $curr . '</span>';
        } else {
            $result .= $curr;
        }
    }
    echo $result . '</p>';
}
?>