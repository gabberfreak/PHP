<?php
$childName = $_GET['childName'];
$wantedPresent = $_GET['wantedPresent'];
$riddles = $_GET['riddles'];

$replacedChildname = preg_replace("/[\s_]/", "-", $childName);

$riddlesScope = explode(";", $riddles);

$lengthName = strlen($childName);
$lengthRiddle = count($riddlesScope);

$pickedRiddle = "";

if ($lengthName > $lengthRiddle) {
    $pickedRiddle = $riddlesScope[0];
} else {
    $riddleLeft = $lengthName % $lengthRiddle;
    $pickedRiddle = $riddlesScope[$riddleLeft];
}

echo htmlspecialchars('$giftOf'.$replacedChildname." = ". "$[wasChildGood] ? "."'".$wantedPresent."'". " : ". "'".$pickedRiddle."'".";");
?>