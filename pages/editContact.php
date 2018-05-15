
<?php define('TITLE','update Info | Info Book');
    include('loginCheck.php');
    include('connection.php');



    $Id = $_GET['id'];
    $_SESSION['ID'] = $Id;
    // echo $Id;
    // echo $Id;

    $query = "SELECT * FROM info WHERE id = '$Id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {

        while($row = mysqli_fetch_assoc($result)) {

            $name               = $row['fullName'];
            $email              = $row['email'];
            $permanent_add      = $row['permanent_add'];
            $present_add        = $row['present_add'];
            $phone              = $row['phone'];
            $profession         = $row['profession'];
            $bio                = $row['bio'];
            

        }

    } else {
            echo "<span class='alert text-danger'>nothing to see here!</span>";
        }

        
    // print_r($name);


 ?>

 

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo TITLE; ?></title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    
</head>
<body style="background: #abb;">
    
<div class="container">

    <div class="row">

        <div class="user">
                <header class="user__header">
                    <h2 style="text-align: center;">Edit Your Contact Information</h2>
                    <a href="userPage.php" class="btn btn-info">Back Home</a>
                </header>
                <hr>

        <div class="col-md-8 col-md-offset-2">

                
                <form action="updateContact.php" method="POST" class="form" 
                enctype="multipart/form-data" class="form" style="padding: 15px; background: #aa9b83; border-radius: 10px; box-shadow: 2px 5px 5px #635b4d;" 

                >

                <div class="col-md-6">

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="full name" class="form-control" name="name" value="<?php echo $name;?>">
                    </div>

                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" placeholder="Email" class="form-control" name="email" value="<?php echo $email;?>">
                    </div>

                    
                    <div class="form-group">
                        <label>Permanent Address</label>
                        <input type="text" placeholder="Permanent address" class="form-control" name="permanent_add" value="<?php echo $permanent_add;?>">
                    </div>


                    <div class="form-group">
                        <label>Present address</label>
                        <input type="text" placeholder="present address" class="form-control" name="present_add" value="<?php echo $present_add;?>">
                    </div>

                </div>

                
                <div class="col-md-6">

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="" placeholder="phone number" class="form-control" name="phone" value="<?php echo $phone;?>">
                    </div>

                    <div class="form-group">
                        <label>Profession</label>
                        <input type="text" placeholder="Your Profession" class="form-control" name="profession" value="<?php echo $profession;?>">
                    </div>

                    <div class="form-group">
                        <label>About Yourself</label>
                        <textarea type="text" class="form-control" name="bio" value=""><?php echo $bio;?></textarea>
                    </div>

                    <div class="form-group">

                        <label>Select image to upload:</label>
                        <br>
                        <span style="color: #a51c1c;"><?php if(isset($_SESSION['typeError'])) { echo $_SESSION['typeError']; unset($_SESSION['typeError']); } ?></span>
                        <input style="border: solid 1px #161614; width: 100%; padding: 5px;" type="file" name="image"/>
                    </div> 

                </div>   

                    <input type="hidden" name="editing" value="<?php echo $Id; ?>" >


                    <button class="btn btn-success btn-block" type="submit" name="submit_contact">update info</button>

                </form>

                <br>
            </div>

        </div>

    </div>


</div>

    <script src="../js/script.js"></script>
</body>
</html>
