<?php 
	include('connection.php');

	$id = $_GET['id'];

	// Delete image from directory
	$previous_file = "SELECT image from info WHERE id = $id";
	$result = mysqli_query($conn, $previous_file);

	$row = $result->fetch_assoc();

	$final = $row['image'];
		
	$deleteImage = unlink($final);


	$sql = "DELETE FROM info WHERE id= '$id'";

	if (mysqli_query($conn, $sql)) {

    	header('Location: userPage.php');

		}


 ?>