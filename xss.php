<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="module.css" />
  </head>
  <body>
  <h3>Reflected Cross Site Scripting</h3>
  <style><?php include 'module.css'; ?></style>

<?php
  $profile = $_GET['search'];
  // vulnerable code
  echo "<h1>" . $profile . "</h1>";

  //fixed code with sanitization
  //echo "<h1>" . filter_var($profile, filter: FILTER_SANITIZE_SPECIAL_CHARS) . "</h1>";

  $conn = mysqli_connect("localhost", "root", "", "database name", "port");

  $sql = "SELECT `name`, `job`, `location`, `bio`, `looking_for`, `interests` FROM `profile` WHERE name = '$profile'";

  $result = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($result);

  if($count > 0)
  {
      while($row = $result->fetch_assoc()) {
          echo "<p>" . "<br>" . "<b>" . "Job: " . "</b>" . $row["job"] .  "<br>" . "<br>" . "<b>" . "Location: " . "</b>" . $row["location"] . "<br>" . 
          "<br>" . "<b>" . "Looking for: " . "</b>" . $row["looking_for"] .  "<br>" . "<br>" . "<b>" . "Interests: " . "</b>" . $row["interests"] . "<br>" . 
          "<br>" . $row["bio"] . "</p>";

        }
  }

?>
  <form method="get" action="xss.php">
    <h1><label for="search">Search profile: </label></h1>
    <input id="search" name="search" value="" />
    <input type="submit" value="Search" />
  </form>
</body>
</html>