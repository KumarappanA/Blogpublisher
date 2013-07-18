<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) 
{
header('Location: index.php');
}

?>
<html>

<head>
<title>Secured Page</title>
</head>

<body>

<p>Welcome <b><?php echo $_SESSION['username']; ?></b> ,
<br>Click <a href="page.php">here</a> to get started .
<br><a href="logout.php">Logout</a>.</p>

</body>

</html>