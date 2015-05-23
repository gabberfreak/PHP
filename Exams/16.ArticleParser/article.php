<?php
date_default_timezone_set('Europe/Sofia');
$text = $_GET['text'];
$articles = preg_split("/\n/", $text, -1, PREG_SPLIT_NO_EMPTY);
$summary = '/(\d{2}\-\d{2}\-\d{4})\s*\-\s*(.{1,100})/';
$time = '/(\d{2}\-\d{2}\-\d{4})/';
$auth = '/\s*([\w\s.-]+)\s*\;/';
$name = '/\s*([\w\s-]+)\s*\%/';
foreach ($articles as $article) {
    preg_match($name, $article, $articleName);
    preg_match($auth, $article, $author);
    preg_match($time, $article, $date);
    preg_match($summary, $article, $articleSummary);
    if (count($articleName) == 0 || count($author) == 0 || count($date) == 0 || count($articleSummary) == 0) {
        continue;
    }
    $articleName = htmlspecialchars(trim($articleName[1]));
    $author = htmlspecialchars(trim($author[1]));
    $date = date('F',strtotime($date[1]));
    $articleSummary = htmlspecialchars(trim($articleSummary[2]));
    echo "<div>\n<b>Topic:</b> <span>$articleName</span>\n<b>Author:</b> <span>$author</span>\n<b>When:</b> <span>$date</span>\n<b>Summary:</b> <span>$articleSummary" ."...</span>\n</div>\n";
}
?>