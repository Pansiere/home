<?php
session_start();                      // Create/resume session
$counter = $_SESSION['counter'] ?? 0; // Get data
$counter = $counter + 1;              // Counter + 1
$_SESSION['counter'] = $counter;      // Update session

$message = 'Page views: ' . $counter; // Message
?>
<?php include 'includes/header.php'; ?> 

<h1>Welcome</h1>
<p><?= $message ?></p>
<p><a href="sessions.php">Refresh this page</a> to see the page views increase.</p>

<?php include 'includes/footer.php'; ?> 