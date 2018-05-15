<?php 

	define('TITLE', 'My Page');
	include('loginCheck.php');
	include('connection.php');



 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo TITLE; ?></title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body style="background: #616661;">

	<?php include('userNav.php'); ?>

	<div class="container-fluid">
		<div>
			<h3 style="text-align: center; margin-top: 0;">Welcome to your Home</h3>
			<hr>
			
		</div>
			<!--Table -->
		<table style="background: #937c7c;" class="table table-bordered table-dark">

				  <thead class="thead-dark">
				    <tr style="text-align:justify; font-size: 15px; font-style: italic;">
				      
				      <th>Picture</th>
				      <th>Full Name</th>
				      <th>Email Address</th>
				      <th>Permanent Address</th>
				      <th>Present Address</th>
				      <th>Phone</th>
				      <th>Profession</th>
				      <th>Bio</th>
				      <th>Action</th>
				    </tr>
				  </thead>

				  <tbody>

					  <?php 

					  	$email = $_SESSION['loggedInUser'];

					    $sql = "SELECT * FROM users WHERE Email='$email'";

	                           $result = mysqli_query($conn, $sql);

	                          	$row = $result->fetch_assoc();

	                          	$userId = $row['id'];


	                          	$sql = "SELECT * FROM info WHERE userId ='$userId'";

	                           	$result = mysqli_query($conn, $sql);

	                           

	                        if ($result->num_rows > 0) {

	                           	while ( $row = $result->fetch_assoc() ) {
	                            
	                            $id = $row['id'];
	                            // echo $id;

	                            echo '<tr>';

	                            echo '<td>'; ?>
	                            	<img class="img-circle" src="<?php echo $row['image']; ?>" height= 60; width= 80;>
	                            <?php echo '</td>';
	                            // echo $row['image'];

	                            echo '<td style="color: #cfd3cf;">'.$row['fullName'].'</td>';
	                            echo '<td style="color: #cfd3cf;">'.$row['email'].'</td>';
	                            echo '<td style="color: #cfd3cf;">'.$row['permanent_add'].'</td>';
	                            echo '<td style="color: #cfd3cf;">'.$row['present_add'].'</td>';
	                            echo '<td style="color: #cfd3cf;">'.$row['phone'].'</td>';
	                            echo '<td style="color: #cfd3cf;">'.$row['profession'].'</td>';
	                            echo '<td style="color: #cfd3cf;">'.$row['bio'].'</td>';


	                            

	                            echo '<td><a href="editContact.php?id='.$id.'"><button class="btn btn-primary btn-xs" data-title="Edit"><span class="glyphicon glyphicon-pencil"></span></button></span></button></a> &nbsp; 

	                            	<a href="deleteContact.php?id='.$id.'"><button class="btn btn-danger btn-xs" data-title="Delete"><span class="glyphicon glyphicon-trash"></span></button></span></button></a></td>';

	                            echo '</tr>';

	                          }
	                         }
	                   ?>
				</tbody>
		</table>
		
	</div>	

<div class="footer" style=" text-align: center; width: 100%; background: #b7bcbc; position: fixed; bottom: 0; padding: 4px;">
    <span style="font-size: 16px;">&copy; <?php echo date('Y'); ?><em> All Right Reserved</em>&mdash;&nbsp;<a href="" style="color: #840d0d;">towsifzilani@gmail.com</a></span>
</div>
</body>
</html>