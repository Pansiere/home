<?php
$day = 'Monday';

$offer = match ($day) {
  'Monday'             => '20% off chocolates',
  'Saturday', 'Sunday' => '20% off mints',
  default              => '10% off your entire order',
};
/*
NOTE: The semi-colon added at the end of the last statement was missing in print edition. 

It worked without it because it is was the last statement in the PHP block,
but it is clearer to have a semi-colon after every statement 
(and one would be required if another statement was added afterwards).
*/
?>
<!DOCTYPE html>
<html>

<head>
  <title>match Expression</title>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
  <h1>The Candy Store</h1>
  <h2>Offers on <?= $day ?></h2>
  <p><?= $offer ?></p>
</body>

</html>