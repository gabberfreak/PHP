<?php

$data = $_GET['data'];
$strings = preg_split("/\s*,\s*/", $data);

$sumGold = 0;
$sumSilver = 0;
$sumDiamonds = 0;

foreach ($strings as $string) {
    preg_match("/mine\s*([a-zA-Z0-9]+)\s*([a-zA-Z]+)\s*([0-9]+)/", $string, $match);
    if (empty($match)) {
        continue;
    } else {
        $mineName = $match[1];
        $typeOfOre = strtolower($match[2]);
        $quantity = intval($match[3]);
        if ($typeOfOre == 'gold') {
            $sumGold += $quantity;
        } else if ($typeOfOre == 'silver') {
            $sumSilver += $quantity;
        } else if ($typeOfOre == 'diamonds') {
            $sumDiamonds += $quantity;
        }
    }
}
echo "<p>*Gold: $sumGold</p>";
echo "<p>*Silver: $sumSilver</p>";
echo "<p>*Diamonds: $sumDiamonds</p>";
?>