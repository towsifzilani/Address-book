<?php 
	define('TITLE','Add Info | My Book');
	include('loginCheck.php');
	include('function.php');
	include('connection.php');

	// print_r("form testing");

	if(isset($_POST['submit_contact'])) {

		$id = $_SESSION['ID'];

		/*if(isset($_SESSION['ID'])) {



			$id = $_SESSION['ID'];
		}*/

		$email = $_SESSION['loggedInUser'];

	 	$sql = "SELECT id FROM users WHERE Email = '$email'";

               $result = mysqli_query($conn, $sql);

              	$row = $result->fetch_assoc();

              	$userId = $row['id'];

              	


        $name 				= validateFormData($_POST['name']);
		$email 				= validateFormData($_POST['email']);
		$permanent_add 		= validateFormData($_POST['permanent_add']);
		$present_add 		= validateFormData($_POST['present_add']);
		$phone 				= validateFormData($_POST['phone']);
		$profession 		= validateFormData($_POST['profession']);
		$bio 				= validateFormData($_POST['bio']);



	if($_FILES['image']['name']) {

		$dir = 'uploads/';

		// get image from form
		$image = $userId.'_'.time();

		$imgFile = $dir. $image;

		$imageType = strtolower(pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION));


		if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg"
		&& $imageType != "gif" ) {

			// echo "sjdksd";

		    $typeError = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$_SESSION['typeError'] = $typeError;
			header('Location: editContact.php?id='.$id);
			exit();
		 
		}

		$finalImage = $imgFile.'.'.$imageType;

		$img_tmp = $_FILES['image']['tmp_name'];
		
		// move uploaded image by move_uploaded_file()
		$uploads = move_uploaded_file($img_tmp, $finalImage);
		
		// delete previous image from directory	
		$previous_file = "SELECT image from info WHERE id = $id";
		$result = mysqli_query($conn, $previous_file);

		$row = $result->fetch_assoc();

		$final = $row['image'];
		
		$deleteImage = unlink($final);

	} else {

			$previous_file = "SELECT image from info WHERE id = $id";
			$result = mysqli_query($conn, $previous_file);

			$row = $result->fetch_assoc();

			$final = $row['image'];

			$finalImage = $final;

	}
	



		$editId = $_POST['editing'];
	 	// run update query
		$query = "UPDATE info SET 
								userID        = $userId,
								fullName      = '$name',
								email         = '$email',
								permanent_add = '$permanent_add',
								present_add   = '$present_add',
								phone         = $phone,
								profession    = '$profession',
								bio           = '$bio',
								image         = '$finalImage'

				 WHERE id = $editId ";



	

		if ( mysqli_query( $conn, $query) ) {

			echo "<span>Your record added successfully!</span>";
    		header('Location: userPage.php');
    		

		} else {
	
    		echo "Error: " . $query . "<br>" . mysqli_error($conn);
		}

	}



 ?>