<?php 

	session_start();

	 unset($_SESSION['loggedInUser']);
	 // print_r($_SESSION['loggedInUser']);

 	header('Location: logIn.php');

 ?>