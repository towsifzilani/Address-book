
<?php define('TITLE','Home | Info Book');
    session_start();
    // unset($_SESSION['name']);
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo TITLE; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>


<body  style="">

    <?php include('navigation.php'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-4" id="side">
            <h1 style="">Welcome to Information Book</h1>
            <hr>
            <p style="color: #d8c6ba;">In our site you can save your information and have security of them.&nbsp; First Complete your registration and start saving your contact. <br> <em>If you have aleady an account, then please <strong style="">LogIn&nbsp;&raquo;&raquo;</strong></em></p>
        </div>
    
        <div class="col-md-5 col-md-offset-2" id="userform">
            <form action="submitReg.php" method="POST" id="regisForm" class="form-horizontal">
                <div class="form-group reg">
                    <label class="col-sm-4 control-label">Your Name<span style="color: red">*</span><br></label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="Name" class="inputs form-control" name="name" value="<?php if(isset($_SESSION['name2'])) { echo $_SESSION['name2'];  unset($_SESSION['name2']); } ?>" >
                            <small style="color: #ce2e06; font-weight: bold;">
                            <!--if name field has error-->
                                <?php if(isset($_SESSION['nameErr'])) { echo $_SESSION['nameErr'];  unset($_SESSION['nameErr']); } ?>
                            </small>
                    </div>
                </div><!--name-->

                    
                <div class="form-group reg">             
                    <label class="col-sm-4 control-label">Email<span style="color: red">*</span><br></label>
                    <div class="col-sm-6">
                        <input type="email" placeholder="Email" class="inputs form-control" name="email" value="<?php if(isset($_SESSION['email2'])) { echo $_SESSION['email2'];  unset($_SESSION['email2']); } ?>">
                            <small style="color: #ce2e06; font-weight: bold;">
                                <!--if email field remain empty-->
                                <?php if(isset($_SESSION['emailErr'])) { echo $_SESSION['emailErr'];  unset($_SESSION['emailErr']); } ?>

                                <!--if the user email already exist in db-->
                                 <?php if(isset($_SESSION['registered'])) { echo $_SESSION['registered'];  unset($_SESSION['registered']); } ?>
                                     
                            </small>
                    </div>
                </div><!--email-->


                    
                <div class="form-group reg">
                    <label class="col-sm-4 control-label">Password<span style="color: red">*<br>

                    </label>
                    <div class="col-sm-6">
                        <input type="password" placeholder="Password" class="inputs form-control" name="password">
                                                <small style="color: #ce2e06; font-weight: bold;">
                            <!--if password field has error-->
                            <?php if(isset($_SESSION['password'])) { echo $_SESSION['password'];  unset($_SESSION['password']); } ?>

                            <!--if passwords not matched-->
                            <?php if(isset($_SESSION['not_matched'])) { echo $_SESSION['not_matched'];  unset($_SESSION['not_matched']); } ?>

                        <?php if(isset($_SESSION['wrong'])) { echo $_SESSION['wrong']; unset($_SESSION['wrong']); }?></small>
                    </div>
                </div><!--password-->

                   
                <div class="form-group reg">
                    <label class="col-sm-4 control-label">Confirm Password<span style="color: red">*</span> <br>
                    </label>
                    <div class="col-sm-6">
                        <input type="password" placeholder="Confirm Password" class="inputs form-control" name="confirm">

                        <small style="color: #ce2e06; font-weight: bold;">
                            <!-- error -->
                                <?php if(isset($_SESSION['confirm'])) { echo $_SESSION['confirm'];  unset($_SESSION['confirm']); } ?>

                        </small>
                    </div>
                </div><!--confirm password-->


                <div class="form-group reg">

                    <label class="col-sm-4 control-label">Phone</label>
                    <div class="col-sm-6">
                        <input type="" placeholder="phone number" class="inputs form-control" name="phone" value="<?php if(isset($_SESSION['phone'])) { echo $_SESSION['phone'];  unset($_SESSION['phone']); } ?>">
                    </div>
                </div><!--phone-->
                
                <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-6">
                        <button class="btn btn-success btn-block" type="submit" name="submit_form">Register</button>
                    </div>
                </div>

            </form>
        </div>

        </div>

    </div>

</div>

    
<?php include('footer.php'); ?>


