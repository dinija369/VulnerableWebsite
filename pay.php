<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Registration Form</title>
    <link rel="stylesheet" href="module.css" />
  </head>
  <body>
    <h1>Payment</h1>
<form method="post" action='payed.php'>
      <fieldset>
        <label for="name"></label>
        <input id="name" name="name" type="text" placeholder="First name*" />
        <label for="surname"></label>
        <input id="surname" name="surname" type="text" placeholder="Last name*" required />
        <label for="number"></label>
        <input id="number" name="number" type="text" placeholder="Card number*" required />
        <label for="date"></label>
        <input id="date" name="date" type="text" placeholder="YYYY-MM-DD*" required />
        <label for="cvv"></label>
        <input id="cvv" name="cvv" type="text" placeholder="CVV/CVC*" required />
      </fieldset>
      <input type="submit" value="Pay" />
    </form>

<?php

$tom = $_GET['tom'];
$jerry = $_GET['jerry'];
$percy = $_GET['percy'];

//faulty code not checking if the input is negative
if($tom != "") {
$tomPrice = 24 * $tom;
} else {
    $tomPrice = 0;
}

if($jerry != "") {
    $jerryPrice = 3 * $jerry;
} else {
    $jerryPrice = 0;
}

if($percy != "") {
    $percyPrice = 52 * $percy;
} else {
    $percyPrice = 0;
}

//fixed code
//if($tom > 0) {
  //$tomPrice = 24 * $tom;
  //} else {
      //$tomPrice = 0;
  //}
  

$total = $tomPrice + $jerryPrice + $percyPrice;

echo "<h2>" . "Your account will be debited:  " . $total . "$" . "</h2>";

?>

</body>
</html>