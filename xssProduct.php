<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="module.css" />
  </head>
  <body>
  <h3>Stored Cross Site Scripting</h3>
<style><?php include 'module.css'; ?></style>
<h1>Comments</h1>

<form method="post" action="xssProduct.php">
        <div class="frame">
            <fieldset>
                <label for="name">Name: </label>
                    <input id="name" name="name" type="text" required />
                <label for="bio">Comment:
                    <textarea id="comment" name="comment" rows="5" cols="30" placeholder="Good job..."></textarea>
                </label>
            </fieldset>
            <input type="submit" value="Submit" />
        </div>
    </form>

<?php

//fix with placeholders

$name = $_POST["name"];
$comment = $_POST["comment"];

//db connection
$conn = mysqli_connect("localhost", "root", "", "database name", "port");

$sql = "SELECT name, comment FROM comments";

if(!is_null($name)) {
  $sqlsecond = "INSERT INTO comments (`name`, `comment`) VALUES ('$name','$comment')";
  $resultsecond = mysqli_query($conn, $sqlsecond);
}

$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

if($count > 0)
{
    while($row = $result->fetch_assoc()) {
        // vulnerable code
        echo "<h2>" . "<br>" . $row["name"] . "    " . "<br>" . "</h2>";
        echo "<p>" . "<br>" . $row["comment"] . "    " . "<br>" . "</p>";

        // fixed code with encoding
        //echo "<h2>" . "<br>" . htmlspecialchars($row["name"]) . "    " . "<br>" . "</h2>";
        //echo "<p>" . "<br>" . htmlspecialchars($row["comment"]) . "    " . "<br>" . "</p>";
      }
}

?>
  </body>
</html>