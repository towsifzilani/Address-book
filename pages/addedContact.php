<?php 

	define('TITLE','Add Info | My Book');
	include('loginCheck.php');
	include('function.php');
	include('connection.php');

	$sizeError = $file_exists = $typeError = "";


	if(isset($_POST['submit_contact'])) {

		$name 				 = validateFormData($_POST['name']);
		$_SESSION['name']    = $name;

		$email 				 = validateFormData($_POST['email']);
		$_SESSION['email']   = $email;

		$permanent_add 		       = validateFormData($_POST['permanent_add']);
		$_SESSION['permanent_add'] = $permanent_add;

		$present_add 		       = validateFormData($_POST['present_add']);
		$_SESSION['present_add']   = $present_add;

		$phone 				 = validateFormData($_POST['phone']);
		$_SESSION['phone']   = $phone;

		$profession 		  	  = validateFormData($_POST['profession']);
		$_SESSION['profession']   = $profession;

		$bio 				= validateFormData($_POST['bio']);
		$_SESSION['bio']    = $bio;


		$email1 = $_SESSION['loggedInUser'];

	 	$sql = "SELECT id FROM users WHERE Email = '$email1'";

               $result = mysqli_query($conn, $sql);

              	$row = $result->fetch_assoc();

              	$userId = $row['id'];

		// Image uploading//

		//image directory
		$dir = 'uploads/';

		// get image from form
		$image = $userId.'_'.time();
		// echo $image;
		// $img = $image;


		$imgFile = $dir . $image;

		$imageType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));

		$finalImage = $imgFile.'.'.$imageType;

		// temporary name on server
		$img_tmp = $_FILES['image']['tmp_name'];


		// Check file size
		if ($_FILES["image"]["size"] > 5000000) {

		    $sizeError = "Sorry, your file is too large.";
		    $_SESSION['sizeError'] = $sizeError;
		    header('Location: addContact.php');
		    exit();
	
		}


		// Allow certain file formats

		if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"
		&& $imageType != "gif" ) {

		    $typeError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$_SESSION['typeError'] = $typeError;
			header('Location: addContact.php');
			exit();
		 
		}
		
		// move uploaded image move_uploaded_file()
		$uploads = move_uploaded_file($img_tmp, $finalImage);
		// $_SESSION['uploaded'] = $uploades;


		// set path in db
		$db_path = $finalImage;


		// print_r($imgFile);

		// $uploadOk = 1;

		// $imageFileType = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));

		// print_r($imgFile);



		$query = "INSERT INTO info (userID, fullName, email, permanent_add, present_add, phone, profession, bio, image) VALUES ( $userId, '$name', '$email', '$permanent_add', '$present_add', $phone, '$profession', '$bio', '$db_path')";

		// echo $query;

		if ( mysqli_query( $conn, $query) ) {

			echo "<span>Your record added successfully!</span>";
    		header('Location: userPage.php');
    		

		} else {
	
    		echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}

	}



 ?>