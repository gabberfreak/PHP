<?php
    $input = array (
      "hello",
        15,
        1.234,
        array(1,2,3),
        (object)[2,34]
    );
    foreach ($input as $variable) {
        if (is_numeric($variable)) {
            echo var_dump($variable);
        } else {
            echo gettype($variable),"\n";
        }
    }
?>
