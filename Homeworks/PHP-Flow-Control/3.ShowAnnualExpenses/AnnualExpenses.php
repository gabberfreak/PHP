<form action="" method="get">
    Enter number of years: <input type="text" name="years"/>
    <button>Show costs</button><br>
    <br/>
    <?php
        if (isset($_GET['years'])) {
            $table = '<table border="1" cellpadding="2"><thead><tr><th>Year</th><th>January</th>
                        <th>February</th><th>March</th><th>April</th><th>May</th><th>June</th><th>July</th>
                            <th>August</th><th>September</th><th>October</th><th>November</th>
                                <th>December</th><th>Total:</th></tr></thead>';
            $total = 0;
            for ($i = 2014; $_GET['years'] > 0; $i-- ,$_GET['years']--) {
                $january = rand(0,999);
                $february = rand(0,999);
                $march = rand(0,999);
                $april = rand(0,999);
                $may = rand(0,999);
                $june = rand(0,999);
                $july = rand(0,999);
                $august = rand(0,999);
                $september = rand(0,999);
                $october = rand(0,999);
                $november = rand(0,999);
                $december = rand(0,999);
                $total += $january + $february + $march + $april + $may + $june + $july + $august + $september + $october + $november + $december;
                $table .= '<tr><td>' . $i . '</td><td>' . $january . '</td><td>' . $february . '</td><td>'
                            . $march . '</td><td>' . $april . '</td><td>' . $may . '</td><td>'
                                . $june . '</td><td>' . $july . '</td><td>' . $august . '</td><td>'
                                    . $september . '</td><td>' . $october . '</td><td>' . $november . '</td><td>'
                                        . $december . '</td><td>' . $total . '</td></tr>';
                $total = 0;
            }
            echo $table;
        }
    ?>
</form>
