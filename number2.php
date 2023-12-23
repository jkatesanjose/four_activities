<!DOCTYPE html>
<html>
<head>
    <title>Problem 2</title>
</head>
<body>
    <h3>Consonant</h3>
    <form action="number2.php" method="post">
        <input type="text" name="userInput" value="<?php echo isset($_POST["userInput"]) ? htmlspecialchars($_POST["userInput"]) : ''; ?>">
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userInput = $_POST["userInput"];
          
        $consonants = findConsonants($userInput);
  
        if ($consonants !== false) {
            echo $consonants;
        } 
        else {
            echo "No consonant";
        }
    }
  
    function findConsonants($input) {
        $consonants = preg_replace("/[aeiouAEIOU]/", "", $input);
  
        if (empty($consonants)) {
            return false;
        }
        return $consonants;
      }
      ?>
</body>
</html>
