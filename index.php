<?php

require('partials/_db.php');



?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Blogs</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
	<?php
	require('partials/_nav.php');
	$sql = "SELECT * FROM blogs ORDER BY dt DESC ";

	$result = mysqli_query($conn, $sql);

	$num = mysqli_num_rows($result);
	
	
	?>

	<div class="container ">
		<div class="row my-3">

<?php

while($row = mysqli_fetch_assoc($result)) {
	$u = $row['user_id'];
	$sql2 = "SELECT * FROM user where user_id = '$u' ";	
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($result2);	
		
echo '

		<div class="card m-3" style="width: 18rem;">
			<img src="img/'.$row['thumbnail'].'" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">'.$row['title'].'</h5>
				<p class="card-text">
					' .substr($row['description'], 0 ,90).'.....
				</p>
				<a href="blog.php?blog='.$row['blog_id'].'" class="btn btn-primary">Read More...</a>
				<p>
				<figcaption class="blockquote-footer"><em>
    Published By: </em>'. $row2['name'] .' <cite title="Source Title"> On '.substr($row['dt'],0,10).'</cite>
  </figcaption>
  </p>
  
			</div>
		</div>
		';
		}
?>




</div>
	</div>










	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>