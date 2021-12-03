<?php

session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$user_name = mysqli_real_escape_string($con, $_POST['user_name']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$message = mysqli_real_escape_string($con, $_POST['message']);

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name) && !empty($message)) {

		$query = "select * from users where user_name = ? and password = ? limit 1;";
		$stmt = mysqli_stmt_init($con);

		if (!mysqli_stmt_prepare($stmt, $query)) {
			echo "SQL statement failed";
		} else {
			mysqli_stmt_bind_param($stmt, "ss", $user_name, $password);
		}

		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if ($result) {
			if ($result && mysqli_num_rows($result) > 0) {

				$user_data = mysqli_fetch_assoc($result);

				$enter_message = "UPDATE users SET message = '$message' WHERE user_name = '$user_name'";
				mysqli_query($con, $enter_message);

				$_SESSION['user_id'] = $user_data['user_id'];
				header("Location: index.php");
				die;
			}
		}
		echo "Wrong username or password!";
	} else {
		echo "Please enter valid information!";
	}
}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
</head>

<body>

	<link rel="stylesheet" href="mystyle.css">
	<div class="bg"></div>

	<div id="box" class=center>

		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name" placeholder="Username"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>
			<input id="text" type="text" name="message" placeholder="Message"><br><br>

			<input id="button" type="submit" value="Login"><br><br>

			<a href="signup.php" class="link">Click to Signup</a><br><br>
		</form>
	</div>
</body>

</html>