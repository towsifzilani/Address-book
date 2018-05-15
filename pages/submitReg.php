<?php
session_start();

include('connection.php');
include('function.php');

$name = $email = $password = $hashPassword = "";
$nameErr = $emailErr = $passErr = $Perror = $confirm_Error = $confirm_hashPassword = $wrongPassword = "";


if(isset($_POST['submit_form'])) {


// check if the field is empty

  if(!($_POST['name'])) {

    $nameErr = "required";
    $_SESSION['nameErr'] = $nameErr;
    

  } else {
   
    $name = validateFormData($_POST["name"]);
    $_SESSION['name2'] = $name;

    // print_r($_SESSION['name2']);

  }



 // check if the field is empty

  if(!($_POST['email'])) {	

      	$emailErr = "required";
    	$_SESSION['emailErr'] = $emailErr;

  	} 	else {

 			// check if the user exist in database throug email

			  $email = validateFormData($_POST['email']);
			  $db_email = "SELECT email from users WHERE Email = '$email'";

			  $result = mysqli_query($conn, $db_email);

  			if( $email && mysqli_num_rows($result) > 0) {

  				// echo "ssss";
  				// exit();

  					$_SESSION['registered'] = "Email is already Registered";
				  	header('Location: index.php');
  					exit();


  			} else {

  				$email = validateFormData($_POST['email']);
  				$_SESSION['email2'] = $email;
  				// print_r($_SESSION['email2']);

  			}

  		}



  // check if the field is empty

   if(!($_POST['password'])) {

   		$passErr = "required";
   		$_SESSION['password'] = $passErr;

   } else {

		$password             = $_POST['password'];
		$hashPassword	      = md5($password);
		// print_r($password);
   }

   // check if the field is empty


   if(!($_POST["confirm"])) {

   		$confirm_Error = 'required';
		$_SESSION['confirm']   = $confirm_Error;
		header('Location: index.php');

	} elseif($_POST['password'] == $_POST['confirm']) {

		$confirm_password     = $_POST['confirm'];
		$confirm_hashPassword = md5($confirm_password);

	} else {
		
		$_SESSION['not_matched'] = "password not matched";
		header('Location: index.php');
		exit();
	}




	$phone                = $_POST['phone'];
	$_SESSION['phone']    = $phone;
	// echo $phone;

	// print_r($_SESSION['phone']);



	// if(strlen($name) > 0 && strlen($emailErr) > 0 && strlen($passErr) > 0 && strlen($confirm_Error) > 0 && strlen($phone) > 0 )  {

	// 	header('Location: index.php');
	// }


$sql = "INSERT INTO users (name, email, password, confirm_password, phone) VALUES ( '$name', '$email', '$hashPassword', '$confirm_hashPassword', $phone )";

 



	
if ( mysqli_query($conn, $sql) ) {

	$_SESSION['loggedInUser'] = $email;

    header('Location: userPage.php');

} else {

	header('Location: index.php');

}
    

} else {

	$wrongPassword = "Give Password";
	$_SESSION['wrong'] = $wrongPassword;
	header('Location: index.php');
	}

?>