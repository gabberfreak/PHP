<?php
$jsonTable = $_GET['jsonTable'];
$input = json_decode($jsonTable);

$numOfCols = intval($input[0]);
$pattern = '/time=(\d+){1,3}ms/';

$string = [];
$symbolCount = 0;

foreach($input[1] as $key => $value) {
    preg_match_all($pattern,$value,$milliseconds);
    if (!empty($milliseconds[1][0])) {
        $charCode = $milliseconds[1][0];
        if (ctype_alpha(chr($charCode))) {
            $string[] = chr($charCode);
            $symbolCount++;
        } else if (chr($charCode) == ' ') {
            $string[] = '';
            $symbolCount++;
        } else if (chr($charCode) == '*' && $symbolCount % $numOfCols != 0) {
            for ($i = $symbolCount % $numOfCols; $i < $numOfCols; $i++) {
                $string[] = '';
                $symbolCount++;
            }
        }
    }
}
while ($symbolCount % $numOfCols != 0) {
    $string[] = '';
    $symbolCount++;
}

$isOpened = false;
$result = "<table border='1' cellpadding='5'><tr>";

for ($j = 0; $j < count($string); $j++) {
    if ($j != 0 && $j % $numOfCols == 0) {
        $result .= '<tr>';
        $isOpened = true;
    }
    $result .= '<td';

    if ($string[$j] != '') {
        $result .= " style='background:#CAF'";
    }

    $result .= '>' . htmlspecialchars($string[$j]) . '</td>';

    if ($j % $numOfCols == ($numOfCols - 1)) {
        $result .= '</tr>';
        $isOpened = false;
    }

}
if ($isOpened) {
    $result .= '</tr>';
}

echo $result . '</table>';
?>