<?php
session_start();

include("Main/connection.php");
include("Main/functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
	<title>My website</title>
</head>

<body>

	<a href="logout.php">Logout</a>
	<h1>This is the index page</h1>

	<br>
	Message: <?php echo $user_data['message']; ?>
</body>

</html>