<?php
if (isset($_GET['errorLog'])) {
    $pattern = '/Exception in thread \"[aA-zZ]+\" java.*[\r\n].*/';
    preg_match_all($pattern,$_GET['errorLog'],$matches);
    $result = '<ul>';
    for ($i = 0; $i < count($matches); $i++) {
        $curr = $matches[$i];
        if ($curr == null) {
            break;
        }
        foreach ($curr as $j) {
            $splitted = explode("at", $j);
            preg_match('/([^.]*):/', $splitted[0],$exception);
            $exception = htmlspecialchars($exception[1]);
            preg_match('/\((.*?):/', $splitted[1],$filename);
            $filename = htmlspecialchars($filename[1]);
            preg_match('/:(\d+)/', $splitted[1],$line);
            $line = htmlspecialchars($line[1]);
            preg_match('/\.(.*)\(/', $splitted[1],$method);
            $method = htmlspecialchars($method[1]);
            $result .= '<li>line <strong>' . $line . '</strong> - <strong>' . $exception . '</strong> in <em>' . $filename . ':' . $method . '</em></li>';
        }
    }
    echo $result . '</ul>';
}
?>