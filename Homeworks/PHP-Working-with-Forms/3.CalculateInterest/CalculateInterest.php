<form action="" method="get">
    Enter Amount <input type="text" name="amount"/><br>
    <input type="radio" name="currency" value="usd"/>USD
    <input type="radio" name="currency" value="eur"/>EUR
    <input type="radio" name="currency" value="bgn"/>BGN
    <br>
    Compound Interest Amount <input type="text" name="interest"/><br>
    <select name="time" id="duration">
        <option value="six">6 Months</option>
        <option value="oneyear">1 Year</option>
        <option value="twoyears">2 Years</option>
        <option value="fiveyears">5 Years</option>
    </select>
    <button name="submit">Calculate</button>
    <?php
        if (isset($_GET['amount']) && isset($_GET['currency']) && isset($_GET['interest']) && isset($_GET['time'])) {
            $amount = $_GET['amount'];
            $currency = $_GET['currency'];
            $compound = $_GET['interest'];
            $period = $_GET['time'];
            switch ($period) {
                case 'six':
                    $period = 6;
                    break;
                case 'oneyear':
                    $period = 12;
                    break;
                case 'twoyears':
                    $period = 24;
                    break;
                case 'fiveyears':
                    $period = 60;
                    break;
            }
            $value = round($amount * pow(1 + (($compound / 100) / 12),($period / 12) * 12), 2);

            if ($currency == 'usd') {
                 echo $value = "$ ". $value;
            } else if ($currency == 'eur') {
                 echo $value = '&euro; ' . $value;
            } else {
                 echo $value .= " lv";
            }
        }
    ?>
</form>
