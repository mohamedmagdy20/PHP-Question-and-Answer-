
<?php
session_start();
require "./lib/users.php";
if(isset($_POST['submit']) && isset($_FILES['my_image'])){
    $img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
                $is_add = adduser($_POST['name'],$_POST['email'],$new_img_name,$_POST['password']);
                if($is_add== 1){
                
                    header("location: index.php");
                } 
                else{
                    echo "Fail to Add";
                }
            }
            
}
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
      rel="stylesheet"
      href="./bootstrap-5.1.0-dist/css/bootstrap.min.css"
    />
    <title>Document</title>
</head>
<body class="bg-light">
    <form action="Adduser.php" method="post" class="container pt-5" enctype="multipart/form-data">>
        <input type="text" name="name" placeholder="Enter Name" class="form-control mb-3">
        <input type="email" name="email" placeholder="Enter Email" class="form-control mb-3">
        <div class="d-flex">
        <input type="file" class="form-control  mb-3" name="my_image">
        </div>
        <input type="text" name="password" placeholder="Enter Password" class="form-control mb-2">
        <button name="submit" class="btn btn-success">Add User</button>
    </form>
<script src="./bootstrap-5.1.0-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>