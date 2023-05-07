<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="module.css" />
  </head>
  <body>
  <h1>Login successful <br></h1>
<?php

$email = $_POST["email"];
$password = $_POST["password"];

//db connection
$conn = mysqli_connect("localhost", "root", "", "<database name>", "<port>");


// vulnerable code
$sql = "SELECT email, password FROM login where email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

//fix option 1 prepared statements
//$sql = "SELECT email, password FROM login where email = ? AND password = ?";
//$stmt = mysqli_stmt_init($conn);
//mysqli_stmt_prepare($stmt, $sql);
//mysqli_stmt_bind_param($stmt, "ss", $email, $password);
//mysqli_stmt_execute($stmt);
//$result = mysqli_stmt_get_result($stmt);
//$count = mysqli_num_rows($result);

//fix option 2 stored procedures
//$sql = CALL 'get_login'('$email', '$password');";
//$stmt = mysqli_stmt_init($conn);
//mysqli_stmt_prepare($stmt, $sql);
//mysqli_stmt_execute($stmt);
//$result = mysqli_stmt_get_result($stmt);
//$count = mysqli_num_rows($result);

//fix option 3 prepared statements and stored procedures
//$sql = "CALL 'get_login'(?, ?);";
//$stmt = mysqli_stmt_init($conn);
//mysqli_stmt_prepare($stmt, $sql);
//mysqli_stmt_bind_param($stmt, "ss", $email, $password);
//mysqli_stmt_execute($stmt);
//$result = mysqli_stmt_get_result($stmt);
//$count = mysqli_num_rows($result);

if($count > 0)
{
  while($row = $result->fetch_assoc()) {
    echo "<h2>" . "<br>" . "Welcome " . $row["email"]. "    " . "<br>" . "</h2>" . "<p>" . "</p>";
  }
}
else {
    header("Location: modulenosignin.html");
}


?>

<form method="post" action="inputvalidation.php">
  <input type="submit" value="Buy Kittens" />
</form>
<form method="post" action="xssProduct.php">
  <input type="submit" value="Leave a comment" />
</form>
<form method="post" action="xss.php">
  <input type="submit" value="Date" />
</form>

</body>
</html>
