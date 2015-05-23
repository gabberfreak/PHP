<?php
date_default_timezone_set('Europe/Sofia');
$currentTime = strtotime($_GET['currentTime']);
$messages = $_GET['messages'];
preg_match_all("/(.*)\/(.*)/m", $messages, $allMessages);
$chatLog = [];
$latestTime = 0;
$result = '';
for ($j = 0; $j < count($allMessages[0]); $j++) {
    $curr = $allMessages[0][$j];
    preg_match("/(.*)\\/(.*)/", $curr, $matches);
    $chat = trim($matches[1]);
    $time = strtotime(trim($matches[2]));
    $chatLog[$time] = $chat;
    if ($time > $latestTime) {
        $latestTime = $time;
    }
}
ksort($chatLog);
foreach ($chatLog as $key => $value) {
    $result .= '<div>' . htmlspecialchars($value) . '</div>' . "\n";
}
$diff = $currentTime - $latestTime;
$lastDay = date('z', $latestTime);
$currentDay = date('z', $currentTime);

if($lastDay == $currentDay) {
    if ($diff < 60) {
        $result .= '<p>Last active: <time>a few moments ago</time></p>';
    } else if ($diff < 60 * 60) {
        $minutes = floor($diff / 60);
        $result .= '<p>Last active: <time>' . $minutes . 'minute(s) ago</time></p>';
    }  else if ($diff < 24 * 60 * 60) {
        $hours = floor($diff / (60 * 60));
        $result .= '<p>Last active: <time>' . $hours . 'hours(s) ago</time></p>';
    }
}
else if ($lastDay + 1 == $currentDay) {
    $result .= '<p>Last active: <time>yesterday</time></p>';
}
else {
    $result .= '<p>Last active: <time>' . date("d-m-Y", $latestTime) . '</time></p>';
}
echo $result;
?> 