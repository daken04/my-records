<?php include('config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Food Order System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div class="login">
        <h1 class="text-center">Login</h1>
        <br><br>

        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>

        <!-- Login form starts Here -->
        <form class="text-center" action="" method="POST">
            Username: <br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>
            Password: <br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form><br><br>
        <!-- Login form ends here -->
        <p class="text-center">Created By - <a href="#">Aryan Verma</a></p>
    </div>

</body>
</html>

<?php
    //Check whether the submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //Process for Login
        //1. Get the data from Login Form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. SQL to check whether the username 
        $sql = "SELECT * FROM tbl_admin WHERE username = '$username' AND password='$password'";

        //Execute the sql query
        $res = mysqli_query($conn,$sql);

        //count rows to check whether the user exists or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //user available and login success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //To check whether the user is logged in or not and logout will unset it

            //Redirect to HomePage/Dashboard
            header('location:'.SITEURL);
        }
        else{
            //User not available and login fail
            $_SESSION['login'] = "<div class='text-center error'>Username or Password did not match</div>";
            //Redirect to HomePage/Dashboard
            header('location:'.SITEURL.'login.php');
        }
    }
?>