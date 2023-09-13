<?php
$id = $_GET['blog'];

$statusMsg = ''; 
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
	header("location: login.php");
	exit;
}
require('partials/_db.php');
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$blog_title = $_POST['blog_title'];
	$blog_desc = $_POST['blog_desc'];
	
	
	
 
// File upload directory 
$targetDir = "img/"; 
 

    if(!empty($_FILES["blog_img"]["name"])){ 
        $fileName = basename($_FILES["blog_img"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
     
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            // Upload file to server 
            if(move_uploaded_file($_FILES["blog_img"]["tmp_name"], $targetFilePath)){ 
                // Insert image file name into database
                $iid = $_SESSION['user_id'];
                	// $sql = "INSERT INTO `blogs` ( `title`, `description`, `thumbnail`,`user_id`) VALUES ('$blog_title', '$blog_desc', '$fileName','$iid')";
                    $updatesql="UPDATE `blogs` SET `title`='$blog_title',`description`='$blog_desc',`thumbnail`='$fileName',`user_id`='$iid' WHERE `blog_id` = $id";
				$result = mysqli_query($conn, $updatesql);
                header("location: dashboard.php");
		        exit;
                
                
                
              //  $insert = $db->query("INSERT INTO images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())"); 
                
                
                
                
                if($result){ 
                	echo "
                	<script>
                	const toastElList = document.querySelectorAll('.toast')
					const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl, option))
                	</script>
                	";
                	
                	
                	
                    //$statusMsg = "The file ".$fileName. " has been uploaded successfully."; 
                }else{ 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = "Sorry, there was an error uploading your file."; 
            } 
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $iid = $_SESSION['user_id'];
                	// $sql = "INSERT INTO `blogs` ( `title`, `description`, `thumbnail`,`user_id`) VALUES ('$blog_title', '$blog_desc', '$fileName','$iid')";
                    $updatesql="UPDATE `blogs` SET `title`='$blog_title',`description`='$blog_desc' ,`user_id`='$iid' WHERE `blog_id` = $id";
				$result = mysqli_query($conn, $updatesql); 
                header("location: dashboard.php");
		        exit;
    } 
}

 
// Display status message 
echo $statusMsg; 
	
	



?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
    .flx {
        display: flex;
		gap:5px;
    }

    .iccon {
        width:100px ;
    }
    </style>
</head>

<body>
    <?php
	require('partials/_nav.php');
	?>


    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="..." class="rounded me-2" alt="...">
            <strong class="me-auto">Success</strong>
            <small>just now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            Your post is published .
        </div>
    </div>






    <div class="container">
        <h1 class="text-center">welcome - <?  php echo $_SESSION['name'] ?></h1>
        <hr>
        <h3 class="text-center">Updating  Blog</h3>

        <?php
        $sql = "SELECT * FROM blogs WHERE blog_id = $id ";	 

        $result = mysqli_query ($conn, $sql);
            while( $row = mysqli_fetch_assoc($result)){

        
echo '
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="blog_title" class="form-label">Title</label>
                <input type="text" class="form-control" id="blog_title" name="blog_title" value=" '.$row['title'].'">
            </div>
            <div class="mb-3">
                <label for="blog_desc" class="form-label">Description</label>
                <textarea class="form-control" id="blog_desc" name="blog_desc" rows="12">  '.$row['description'].' </textarea >
            </div>
            <div class="mb-3 row">
                <div><label for="blog_img" class="form-label">Featured Image </label>
                <input class="form-control" type="file" id="blog_img" name="blog_img" value="'.$row['thumbnail'].'" ></div>
                <img src="blog/1.jpg" alt="dghs">
            </div>



            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>';

    }
    ?>







    </div>



    








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>