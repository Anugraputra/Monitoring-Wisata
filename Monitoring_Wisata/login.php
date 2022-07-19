<?php
require "functions.php";
session_start();
if (isset($_SESSION["login"])) {
	header("location: index.php");
	exit;
}

if (isset($_POST["submit"])) {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	// CEK USERNAME
	if (mysqli_num_rows($result) === 1) {
		
		//CEK PASSWORD
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {
			// SET SESSION
			$_SESSION["login"] = true;
			header("Location: index.php");
			exit;
		} 
	}
	$eror = true;
}

?>

<html>
    <head>
		<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/style/login.css">
    </head>
    <body>
	<div class="container">
		<h1>LOGIN</h1>
		<?php if (isset($eror)) :?>
			<form action="">
				<button class="eror">USERNAME / PASSWORD SALAH!</button> 
			</form>
		<?php endif;?>
		<form method="post" action="">
			<div class="form-control">
				<input type="text" name="username" required="" >
				<label>Your Username</label>
			</div>
			<div class="form-control">
				<input type="password" name="password" required="">
				<label>Your Password</label>
			</div>
			<button class="btn" name="submit"><img src="assets/icon/icons8-loginblue-30.png" alt="" width="25" height="24"></button>
			<a href="index.php" class="btn"><img src="assets/icon/icons8-backblue-30.png" alt="" width="25" height="24"><a href="index.php"></a>
			<p class="text">Dont't have an account?<a href="register.php">Create Accont</a></p>
		</form>
	</div>
	<script src="assets/js/scriptlogin.js"></script>
</body>
</html>