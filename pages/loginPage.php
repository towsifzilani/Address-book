<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo TITLE; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/logIn.css">
    <link rel="stylesheet" href="../css/style.css">
</head>


<body id="body">

<?php include('navigation.php'); ?>

    <div class="container">
        <div class="row">
        	<div class="col-md-5" id="side" style="" id="loginBox">
            <h2 style="text-align: center; color: #fff;">Welcom to Information Book</h2>
            <hr>
            <p style="font-size: 16px; color: #d8c6ba;">Log into our information Book site and save your address informations&nbsp; If you have already registered then log in with your registered email address and password.</p>

        </div>
        
            <div class="col-md-5 pull-right">
                

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="user_form">
                    <h3>Please Log In here!!</h3>
                    <hr>
                    <div class="form-group">
                        <label for="email" class="sr-only">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="enter your email" id="email"  value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email'];  unset($_SESSION['email']); } ?>">           
                    </div>

                    <div class="form-group">
                        <span><?php echo $dbError; ?></span>
                        <span><?php echo $loginError; ?></span>
                        
                        <label for="password" class="sr-only">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="password" id="password">           
                    </div>

                    <button type="submit" name="login" class="btn btn-primary">Log In</button>

                    <br><br>

                    <p style="color: #bdccbd;">If you're not a registered, then <strong><a style="color: #13331b;" href="index.php" >SignUp</a></strong>&nbsp;here!</p>

                </form>
                
            </div>

        </div>

    </div>
<?php include('footer.php'); ?>

<!--     <div class="footer" style=" text-align: center; width: 100%; background: #a59d9d; position: fixed; bottom: 0; padding: 4px;">
        <span style="font-size: 16px;">&copy; <?php  ?><em>All Right Reserved</em>&mdash;&nbsp;<a href="" style="color: #840d0d;">towsifzilani@gmail.com</a></span>
    </div>


    <script src="js/script.js"></script>
</body>
</html> -->
