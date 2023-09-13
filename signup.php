<?php
$allset =false;
$exist =false;
$pswdNotMatch =false;
$insert = false;
$showAlert = false;

require('partials/_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$name = $_POST['name'];
	$username = $_POST['user'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];


	$existsql = "select * from user where username = '$username'";
	$result = mysqli_query($conn, $existsql);
	$numexist = mysqli_num_rows($result);
	if ($numexist > 0) {
		$exist = true;
	} else {
	if($password == $cpassword) {
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO `user` ( `name`, `username`, `password`) VALUES ('$name', '$username', '$hash')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			$allset = true;
		}
	}else{
			$pswdNotMatch = true;
		}
	}
}
?>


<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login system</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
	<?php


	require('partials/_nav.php');

	if ($allset) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Welcome!</strong> You are joined.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

	}

	if ($exist) {
		echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>user</strong> Already exists.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

	}

	if ($pswdNotMatch) {
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>No!</strong> password must be same.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
	}

	?>

	<div class="container my-4">




		<h1 class="text-center">Signup for join </h1>




		<form action="" method="POST">
			<div class="mb-3">
				<label for="name" class="form-label">Your Name</label>
				<input type="text" class="form-control" id="name" name="name" required >

			</div>
			<div class="mb-3">
				<label for="user" class="form-label">Username</label>
				<input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp" required>

			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>
			<div class="mb-3">
				<label for="cpassword" class="form-label">Confirm Password</label>
				<input type="password" class="form-control" id="cpassword" name="cpassword" required>
			</div>
			<div id="emailHelp" class="form-text">
				Please confirm password will be same.
			</div>

			<button type="submit" class="btn btn-primary my-2">Sign Up</button>
				<a href="login.php" class="btn btn-primary my-2">Login</a>
		</form>




	</div>







	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>