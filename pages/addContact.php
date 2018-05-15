
<?php define('TITLE','Add Info | My Book');
    include('loginCheck.php');


 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo TITLE; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
</head>
<body style="background: #dbccb3;">
    
<div class="container">

    <div class="row">
        <hr>

        <div class="user">
                <header class="user__header">
                    <!-- <h2 style="text-align: center;">Add Your Contact Information</h2> -->
                    <a href="userPage.php" class="btn btn-info">Back Home</a>
                </header>
                <hr>

        <div class="col-md-8 col-md-offset-2">
            <div class="row">


                
            <form action="addedContact.php" method="POST" enctype="multipart/form-data" class="form" style="padding: 15px; background: #aa9b83; border-radius: 10px; box-shadow: 2px 5px 5px #635b4d;">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="full name" class="form-control" name="name" value="<?php if(isset($_SESSION['name'])) { echo $_SESSION['name'];  unset($_SESSION['name']); } ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="Email" class="form-control" name="email" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email'];  unset($_SESSION['email']); } ?>">
                    </div>

                    
                    <div class="form-group">
                        <label>Permanent Address</label>
                        <input type="text" placeholder="Permanent address" class="form-control" name="permanent_add" value="<?php if(isset($_SESSION['permanent_add'])) { echo $_SESSION['permanent_add'];  unset($_SESSION['permanent_add']); } ?>">
                    </div>


                    <div class="form-group">
                        <label>Present address</label>
                        <input type="text" placeholder="present address" class="form-control" name="present_add" value="<?php if(isset($_SESSION['present_add'])) { echo $_SESSION['present_add'];  unset($_SESSION['present_add']); } ?>">
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="" placeholder="phone number" class="form-control" name="phone" value="<?php if(isset($_SESSION['phone'])) { echo $_SESSION['phone'];  unset($_SESSION['phone']); } ?>">
                    </div>

                    <div class="form-group">
                        <label>Profession</label>
                        <input type="text" placeholder="Your Profession" class="form-control" name="profession" value="<?php if(isset($_SESSION['profession'])) { echo $_SESSION['profession'];  unset($_SESSION['profession']); } ?>">
                    </div>

                    <div class="form-group">
                        <label>Bio</label>
                        <textarea type="text" class="form-control" name="bio"><?php if(isset($_SESSION['bio'])) { echo $_SESSION['bio'];  unset($_SESSION['bio']); } ?></textarea>
                    </div>

                    <div class="form-group">

                        <label>Select image to upload:</label>
                        <br><span style="color: #b73737"><?php if(isset($_SESSION['fileExists'])) { echo $_SESSION['fileExists'];  unset($_SESSION['fileExists']); } ?>
                            &nbsp;
                            <?php if(isset($_SESSION['sizeError'])) { echo $_SESSION['sizeError'];  unset($_SESSION['sizeError']); } ?>
                            &nbsp;
                            <?php if(isset($_SESSION['typeError'])) { echo $_SESSION['typeError'];  unset($_SESSION['typeError']); } ?>
                            

                        </span>
                        <input style="border: solid 1px #161614; width: 100%; padding: 5px;" type="file" name="image"/>
                        <spanstyle="color: #e0182f;">*</span><!-- <small>Image size must not exceeds 50KB and format must be <B>"jpg, jpeg, png, gif"</B></small> -->

                    </div>

                </div>


                    <button class="btn btn-success btn-block" type="submit" name="submit_contact">Add info</button>

            </form>
            </div>

                <br>
            </div>

        </div>

    </div>


</div>
<div class="footer" style=" text-align: center; width: 100%; background: #a59d9d; position: relative; bottom: -51px; padding: 4px;">
            <span style="font-size: 16px;">&copy; <?php echo date('Y'); ?><em>All Right Reserved</em>&mdash;&nbsp;<a href="" style="color: #840d0d;">towsifzilani@gmail.com</a></span>
        </div>


    <script src="../js/script.js"></script>
</body>
</html>
