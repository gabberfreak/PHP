<form action="" method="post">
    <input type="text" name="string"/>
    <input type="radio" name="check" value="palindrome"/>Check Palindrome
    <input type="radio" name="check" value="reverse"/>Reverse String
    <input type="radio" name="check" value="split"/>Split
    <input type="radio" name="check" value="hash"/>Hash String
    <input type="radio" name="check" value="shuffle"/>Shuffle String
    <button>Submit</button><br>

    <?php
        if (isset($_POST['string']) && $_POST['check']) {
            $stringValue = $_POST['string'];
            $radio = $_POST['check'];
            if ($radio == 'palindrome') {
                function isPalindrome($element) {
                    $a = strtolower(preg_replace("/[^A-Za-z0-9]/", "", $element));
                    return $a == strrev($a);
                }
                if (isPalindrome($stringValue)) {
                    echo $stringValue . " is a palindrome!";
                } else {
                    echo $stringValue . " is not a palindrome!";
                }
            } else if ($radio == 'reverse') {
                echo strrev($stringValue);
            } else if ($radio == 'split') {
                $stringValue = str_replace(' ','',$stringValue);
                $arr = str_split($stringValue);
                $arr = implode(" ", $arr);
                echo $arr;
            } else if ($radio == 'hash') {
                echo crypt($stringValue);
            } else if ($radio == 'shuffle') {
                echo str_shuffle($stringValue);
            }
        }
    ?>
</form>
