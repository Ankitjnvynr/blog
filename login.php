<?php
$pswdNotMatch = false;
$userNotFound= false;


require('partials/_db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


	$username = $_POST['user'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user WHERE  username = '$username'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 1) {
		while($row = mysqli_fetch_assoc($result)) {
		if( password_verify( $password,  $row['password'])) {
		$logged = true;
		session_start();
		$_SESSION['loggedin'] = true;
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['name'] = $row['name'];
		header("location: dashboard.php");
		exit;
		
	}
	else{
		$pswdNotMatch = true;
	}
	
		}	
	}
 else {
	$userNotFound = true;
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


	if ($pswdNotMatch) {
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Invalid password!</strong> please check again.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

	}

	if ($userNotFound) {
		echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>This User!</strong> not exist .
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
	}


	?>
	

	<div class="container my-4">




		<h1 class="text-center">login to system </h1>




		<form action="" method="post">
			<div class="mb-3">
				<label for="user" class="form-label">Username</label>
				<input type="text" class="form-control" id="user" name="user" aria-describedby="emailHelp" required>

			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label>
				<input type="password" class="form-control" id="password" name="password" required>
			</div>


			<button type="submit" class="btn btn-primary">LogIn</button>
		</form>




	</div>







	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>