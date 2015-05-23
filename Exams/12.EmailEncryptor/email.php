<?php
$recipient = htmlspecialchars($_GET['recipient']);
$subject = htmlspecialchars($_GET['subject']);
$body = htmlspecialchars($_GET['body']);
$key = $_GET['key'];
//    $recipient = htmlspecialchars('info@softuni.bg');
//    $subject = htmlspecialchars('SoftUniConf <2014>');
//    $body = htmlspecialchars('SoftUniConf <2014> is coming.
//<a href="https://softuni.bg/SoftUniConf">Learn more</a>');
//    $key = 's3cr3t!';
$keySplitted = str_split($key);
$email = "<p class='recipient'>$recipient</p><p class='subject'>$subject</p><p class='message'>$body</p>";
$emailSplitted = str_split($email);
$result = '|';
for ($i = 0; $i < count($emailSplitted); $i++) {
    $curr = ord($emailSplitted[$i]);
    $lastIndexMess = count($emailSplitted) - 1;
    for ($j = 0; $j <= count($keySplitted); $j++) {
        $lastIndexKey = count($keySplitted) - 1;
        if ($i == $lastIndexMess + 1) {
            break;
        }

        $curr2 = ord($keySplitted[$j]);
        $sum = dechex($curr * $curr2);
        $result .= $sum . '|';
        $i++;
        $curr = ord($emailSplitted[$i]);


        if ($j == $lastIndexKey) {
            $j = $lastIndexKey - $j - 1;
        }
    }
}
echo $result;
?>