<!DOCTYPE html>
<html>
<head>
    <title>Problem 1</title>
</head>
<body>
    <h3>Even Number</h3>
    <form action="number1.php" method="post">
        <input type="text" name="userInput" value="<?php echo isset($_POST["userInput"]) ? htmlspecialchars($_POST["userInput"]) : ''; ?>">
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userInput = $_POST["userInput"];
        
        $evenNumber = findEvenNumber($userInput);
        
        if ($evenNumber !== false) {
            echo $evenNumber;
        } 
        else {
            echo "No even number";
        }
    }

    function findEvenNumber($input) {
        if (preg_match("/(\d+)/", $input, $matches)) {
            $number = (int) $matches[1];
            if ($number % 2 == 0) {
                return $number;
            }
        }
        return false;
    }
    ?>
</body>
</html>

