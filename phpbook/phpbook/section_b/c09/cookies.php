<?php
$counter = $_COOKIE['counter'] ?? 0; // Get data
$counter = $counter + 1;             // +1 to counter 
setcookie('counter', $counter);      // Update cookie

$message = 'Page views: ' . $counter; // Message
?>
<?php include 'includes/header.php'; ?> 

<h1>Welcome</h1>
<p><?= $message ?></p>
<p><a href="cookies.php">Refresh this page</a> to see the page views increase.</p>

<?php include 'includes/footer.php'; ?> 