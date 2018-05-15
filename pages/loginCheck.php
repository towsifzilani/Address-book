
<?php 
	session_start();

   if( !$_SESSION['loggedInUser'] ) {

		header('Location: logIn.php');
	} 


 ?>