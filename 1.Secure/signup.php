<?php
session_start();

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		//save to database
		$user_id = random_num(20);
		$query = "insert into users (user_id,user_name,password) values ('$user_id', ?, ?)";

		$stmt = mysqli_stmt_init($con);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "ss", $user_name, $password);
		}

		mysqli_stmt_execute($stmt);

		header("Location: login.php");
		die;
	} else {
		echo '<script>alert("Please enter some valid information!")</script>';
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<title>Signup</title>
</head>

<body>

	<link rel="stylesheet" href="mystyle.css">
	<div class="bg"></div>

	<div id="box" class=center>

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php" class=link>Click to Login</a><br><br>
		</form>
	</div>
</body>

</html>