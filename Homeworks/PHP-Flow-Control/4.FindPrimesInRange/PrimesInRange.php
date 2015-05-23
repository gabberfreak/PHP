<form action="" method="post">
    Starting Index: <input type="text" name="start"/>
    End: <input type="text" name="end"/>
    <button>Submit</button><br>

    <?php
        if (isset($_POST['start']) && isset($_POST['end'])) {
            function isPrime($num) {
                if ($num < 2) {
                    return false;
                }
                if ($num != round($num)) {
                    return false;
                }
                $isPrime = true;
                for ($i = 2; $i <= sqrt($num); $i++) {
                  if ($num % $i == 0) {
                      $isPrime = false;
                  }
                }
                return $isPrime;
            }
            $start = $_POST['start'];
            $end = $_POST['end'];
            $numbers = array();
            for ($i = $start; $i <= $end; $i++) {
                if (isPrime($i)) {
                    $numbers[] = "<span style='font-weight: bold'>$i</span>";
                } else {
                    $numbers[] = $i;
                }
            }
            echo implode(", ", $numbers);
        }
    ?>
</form>
