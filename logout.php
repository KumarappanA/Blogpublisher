<?php

// Inialize session
session_start();

// Delete certain session
unset($_SESSION['username']);
// Delete all session variables
// session_destroy();

?>
<html>
<title>Logout</title>
<body>
<p>You have successfully logged out.<br>
Click <a href="index.php">here</a> to goto Main page.
</p>
</body>
</html>

