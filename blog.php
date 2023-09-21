<?php
$comment = false;


require('partials/_db.php');

$id = $_GET['blog'];


// comment script of php 
if(isset($_POST['Cbtn'])){
    $cname = $_POST['cname'];
    $cemail = $_POST['cemail'];
    $comment = $_POST['comment'];

    $cmtsql = "INSERT INTO `blog_comments`(`name`, `email`, `comment`, `blog_id`) VALUES ('$cname','$cemail','$comment','$id')";
    $cmtresult = mysqli_query($conn, $cmtsql);
    if($cmtresult){
        $comment = true;
    }

}




$sql = "SELECT * FROM blogs WHERE blog_id = $id ";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog: <?php echo $row['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    .text-body-secondary {

        text-align: justify;
    }
    </style>
</head>

<body>
    <?php
	require('partials/_nav.php');
	
	//	$num = mysqli_num_rows($result);
    if($comment){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Thanks for comment!</strong> Your commnet will be show after approval.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    }
     

    

	?>
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Bootstrap</strong>
            <small class="text-body-secondary">11 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Hello, world! This is a toast message.
        </div>
    </div>

    <div class="container text-justify">


        <?php
		// while ($row = mysqli_fetch_assoc($result)) {
		$u = $row['user_id'];
	$sql2 = "SELECT * FROM user where user_id = '$u' ";	
	$result2 = mysqli_query($conn, $sql2);
	$row2 = mysqli_fetch_assoc($result2);


			echo '
			<div class="my-2">
			<img src="img/'.$row['thumbnail'].'" class="img-fluid" alt="...">
			</div>
			<div class="">
				<h3 class="my-3">'.$row['title'].'</h3>
				<p class="text-body-secondary text-justify">
					' .$row['description'].'
				</p>
					<p class="text-right" >
				<figcaption class="blockquote-footer"><em>
    Published By: </em>'. $row2['name'] .' <cite title="Source Title"> On '.substr($row['dt'],0,10).'</cite>
  </figcaption>
  </p>
			</div>
		';
		// }
		?>




        <!-- =======================comment section================================== -->

        <div class="border border-primary p-2 rounded bg-primary-subtle">
            <form action="" method="post">
                <h4 class="text-primary">Leave a comment</h4>
                <div class="row g-2">
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="cname" name="cname" required
                                placeholder="name@example.com">
                            <label for="Cname">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="cemail" name="cemail" required
                                placeholder="name@example.com">
                            <label for="cemail">Email address</label>

                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                            name="comment" style="height: 100px" required></textarea>
                        <label for="floatingTextarea2">Write your commnet</label>
                    </div>


                </div>
                <button type="submit" name="Cbtn" class="btn btn-primary my-2">Comment</button>
            </form>
        </div>

        <!-- ORDER BY cmt_date DESC  -->

        <?php
        $sql3 = "SELECT * FROM `blog_comments` WHERE blog_id = '$id' ";
        // echo "$id";
        $result3 = mysqli_query($conn, $sql3);

        $num3 = mysqli_num_rows($result3);
        while ($row3 = mysqli_fetch_assoc($result3)) {
	

            echo '
        <div class="card my-3">
            <h5 class="card-header d-flex justify-content-between"><em>'.$row3['name'].' (<i>ankitbkana@outlook.com</i> )</em><em>
                    21-09-2023</em></h5>
            <div class="card-body">

                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

            </div>
        </div> ';

        }

        ?>


    </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>