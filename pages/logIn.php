<?php 
	define('TITLE', 'Log In| My Book');

    session_start();
    include('connection.php');
    include('function.php');

  
    $loginError = $dbError = "";

    if(isset($_POST['login'])) {



                $formEmail = validateFormData($_POST['email']);
                $_SESSION['email'] = $formEmail;
                $formPassword = validateFormData($_POST['password']);
                $hashed_formPassword = md5($formPassword);

                $query = "SELECT email, password FROM users WHERE email= '$formEmail'";

                $result = mysqli_query( $conn, $query);

                //verify if result is returned

                if ( mysqli_num_rows($result) > 0 ) {

                    $row = mysqli_fetch_assoc($result);

                        $email     = $row['email'];
                        $pass      = $row['password'];

                        // echo $hashed_formPassword."<br>"; 
                        // echo $pass;

                    if ( $hashed_formPassword == $pass ) {

                        // correct login details
                        // store data in session variables
                        $_SESSION['loggedInUser'] = $email;

                        header('Location: userPage.php');

                        } else {

                         $loginError = "<div class='alert alert-danger'>wrong password</div>";

                                } 

            }       else {

                        $dbError = "<div class='alert alert-danger'>No such user in database !! <a class='close' data-dismiss='alert'>&times;</a></div>";
                            }

    }


    include('loginPage.php');

 ?>



