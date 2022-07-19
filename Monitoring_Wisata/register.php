<?php
require "functions.php";
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
		<script>
			alert('Admin Baru Berhasil di Tambahkan!');
		</script>
		";
    } else {
        echo mysqli_error($conn);
    }
}

?>


<html>
    <head>
		<title>Register</title>
	<link rel="stylesheet" type="text/css" href="assets/style/register.css">
    </head>
    <body>
	<div class="container">
		<h1>Register</h1>
		<form method="post" action="">
			<div class="form-control">
				<input type="text" name="username" required="" >
				<label>Username</label>
			</div>
			<div class="form-control">
				<input type="password" name="password" id="password" required="">
				<label>Password</label>
			</div>
			<div class="form-control">
				<input type="password" name="password2" id="password2" required="">
				<label>Confirm Password</label>
			</div>
			<button class="btn" name="register"><img src="assets/icon/icons8-registerblue-30.png" alt="" width="25" height="24"></button>
			<a href="login.php" class="btn"><img src="assets/icon/icons8-backblue-30.png" alt="" width="25" height="24"><a href="login.php"></a>
		</form>
	</div>
	<script src="assets/js/scriptlogin.js"></script>
</body>
</html>