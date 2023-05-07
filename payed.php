<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="module.css" />
  </head>
  <body>
    <h1>Payment successful</h1>
        </div>
    </form>

<?php
    //pattern="[a-z0-5]{8,}"
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $number = $_POST["number"];
    $date = $_POST["date"];
    $cvv = $_POST["cvv"];

    
    //db connection
    $conn = mysqli_connect("localhost", "root", "", "database name", "port");

    $sql = "SELECT `name`, `surname` FROM `register` WHERE name = '$name' and surname = '$surname'";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if($count > 0) {
        $sqlTwo = "INSERT INTO `bank`(`name`, `card_number`, `date`, `cvv`) VALUES ('$name','$number','$date','$cvv')";
        $stmtTwo = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmtTwo, $sqlTwo);
        mysqli_stmt_execute($stmtTwo);
    }

?>

    </body>
</html>