<?php
$text = $_GET['text'];
$minFontSize = intval($_GET['minFontSize']);
$maxFontSize = intval($_GET['maxFontSize']);
$step = intval($_GET['step']);
$minValue = $minFontSize;
$arr = str_split($text);
$isIncreasing = true;
$result = '';
for ($i = 0; $i < count($arr); $i++) {
    $curr = htmlspecialchars($arr[$i]);
    $asciValue = ord($curr);
    if ($asciValue % 2 == 0) {
        if (ctype_alpha($curr)) {
            $result .= '<span' . ' style=\'font-size:' . $minFontSize . ';text-decoration:line-through;\'>' . $curr . '</span>';
            if ($minFontSize >= $maxFontSize) {
                $minFontSize -= $step;
                $isIncreasing = false;
            } else if ($minFontSize < $maxFontSize) {
                if ((!$isIncreasing) && ($minFontSize != $minValue)) {
                    $minFontSize -= $step;
                } else if ($minFontSize == $minValue) {
                    $isIncreasing = true;
                    $minFontSize += $step;
                } else {
                    $minFontSize += $step;
                }
            }
        } else {
            $result .= '<span' . ' style=\'font-size:' . $minFontSize . ';text-decoration:line-through;\'>' . $curr . '</span>';
        }

    } else if ($asciValue % 2 == 1) {
        if (ctype_alpha($curr)) {
            $result .= '<span' . ' style=\'font-size:' . $minFontSize . ';\'>' . $curr . '</span>';
            if ($minFontSize >= $maxFontSize) {
                $minFontSize -= $step;
                $isIncreasing = false;
            } else if ($minFontSize < $maxFontSize) {
                if ((!$isIncreasing) && ($minFontSize!= $minValue)) {
                    $minFontSize -= $step;
                } else if ($minFontSize == $minValue) {
                    $isIncreasing = true;
                    $minFontSize += $step;
                } else {
                    $minFontSize += $step;
                }
            }
        } else {
            $result .= '<span' . ' style=\'font-size:' . $minFontSize . ';\'>' . $curr . '</span>';
        }
    }
}
echo $result;
?>