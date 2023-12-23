<!DOCTYPE html>
<html>
<head>
    <title>Problem 4</title>
</head>
<body>
    <h3>Number to Word</h3>
    <form method="post">
        <input type="text" name="number" value="<?php echo isset($_POST["number"]) ? htmlspecialchars($_POST["number"]) : ''; ?>">
        <input type="submit" value="Convert">
    </form>
    <?php
    $twodigits = ["", " TEN", " TWENTY", " THIRTY", " FORTY", " FIFTY", " SIXTY", " SEVENTY", " EIGHTY", " NINETY"];
    $onedigit = ["", " ONE", " TWO", " THREE", " FOUR", " FIVE", " SIX", " SEVEN", " EIGHT", " NINE", " TEN", " ELEVEN", " TWELVE", " THIRTEEN", " FOURTEEN", " FIFTEEN", " SIXTEEN", " SEVENTEEN", " EIGHTEEN", " NINETEEN"];

    function is_numeric_value($str) {
        return is_numeric($str);
    }

    function convertUptoThousand($number, $onedigit, $twodigits) {
        $soFar = "";
        if ($number % 100 < 20) {
            $soFar = $onedigit[$number % 100];
            $number = intval($number / 100);
        } else {
            $soFar = $onedigit[$number % 10];
            $number = intval($number / 10);
            $soFar = $twodigits[$number % 10] . $soFar;
            $number = intval($number / 10);
        }
        if ($number == 0) {
            return $soFar;
        }
        return $onedigit[$number] . " HUNDRED " . $soFar;
    }

    function convertNumberToWord($number, $onedigit, $twodigits) {
        if ($number == 0) {
            return "ZERO";
        }

        $num = strval($number);
        $pattern = "000000000000";
        $num = str_pad($num, strlen($pattern), "0", STR_PAD_LEFT);

        $billions = intval(substr($num, 0, 3));
        $millions = intval(substr($num, 3, 3));
        $hundredThousands = intval(substr($num, 6, 3));
        $thousands = intval(substr($num, 9, 3));

        $tradBillions = "";
        switch ($billions) {
            case 0:
                $tradBillions = "";
                break;
            case 1:
                $tradBillions = convertUptoThousand($billions, $onedigit, $twodigits) . " BILLION ";
                break;
            default:
                $tradBillions = convertUptoThousand($billions, $onedigit, $twodigits) . " BILLION ";
        }

        $result = $tradBillions;
        $tradMillions = "";
        switch ($millions) {
            case 0:
                $tradMillions = "";
                break;
            case 1:
                $tradMillions = convertUptoThousand($millions, $onedigit, $twodigits) . " MILLION ";
                break;
            default:
                $tradMillions = convertUptoThousand($millions, $onedigit, $twodigits) . " MILLION ";
        }

        $result = $result . $tradMillions;
        $tradHundredThousands = "";
        switch ($hundredThousands) {
            case 0:
                $tradHundredThousands = "";
                break;
            case 1:
                $tradHundredThousands = "ONE THOUSAND ";
                break;
            default:
                $tradHundredThousands = convertUptoThousand($hundredThousands, $onedigit, $twodigits) . " THOUSAND ";
        }

        $result = $result . $tradHundredThousands;
        $tradThousand = convertUptoThousand($thousands, $onedigit, $twodigits);
        $result = $result . $tradThousand;

        return $result;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = isset($_POST["number"]) ? $_POST["number"] : 0;
        if (is_numeric_value($number)) {
            $number = intval($number);
            $output = convertNumberToWord($number, $onedigit, $twodigits);
            echo $output;
        } else {
            echo "Please enter a valid numeric value.";
        }
    }
    ?>
</body>
</html>
