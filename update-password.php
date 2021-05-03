<?php 
    include('partials/menu.php');
    include('config/constants.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
            if(isset($_GET['id']))
            {
                $id=$_GET['id'];
            }
        ?>

        <form action="" method="POST">
        
            <table class="tbl-30">
                <tr>
                    <td>Old Password: </td>
                    <td>
                        <input type="password" name = "current_password" placeholder="Old Password">
                    </td>
                </tr>

                <tr>
                    <td>New Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder="New Password">
                    </td>
                </tr>

                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder="confirm Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                    </td>
                </tr>
            </table>

        </form>


    </div>
</div>

<?php
        //check whether the submit button is clicked or not
        if(isset($_POST['submit']))
        {
            //Get the data from form
            $id = $_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);

            //Check whether the user with correct ID and Password exists or not
            $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

            //Execute the Query
            $res = mysqli_query($conn,$sql);

            if($res==true)
            {
                //Check whether the data is available or not
                $count = mysqli_num_rows($res);

                if($count==1)
                {
                    //User exists and password can be changed
                    //echo "User found";
                    //Check whether the new password and confirm password match or not
                    if($new_password==$confirm_password)
                    {
                        //Update the password
                        $sql2 = "UPDATE tbl_admin SET
                            password='$new_password'
                            WHERE id = $id
                        ";

                        //Execute the Query
                        $res2 = mysqli_query($conn,$sql2);

                        //Check whether the query executed or not
                        if($res==true)
                        {
                            //Display Success message
                            //Redirect to manage Page with Error message
                            $_SESSION['change-pwd'] = "<div class='success'>Password changes successfully</div>";
                            //Redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                        else
                        {
                            //Display error message
                            //Redirect to manage Page with Error message
                            $_SESSION['chnage-pwd'] = "<div class='error'>failed to Change password</div>";
                            //Redirect the user
                            header('location:'.SITEURL.'admin/manage-admin.php');
                        }
                    }
                    else
                    {
                        //Redirect to manage Page with Error message
                        $_SESSION['pwd-not-match'] = "<div class='error'>Password did not match</div>";
                        //Redirect the user
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }
                }
                else
                {
                    //User does not exist set message and redirect
                    $_SESSION['user-not-found'] = "<div class='error'>User Not Found.</div>";
                    //Redirect the user
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            }

            //Check whether the new password and confirm passwordmatch or not

            //Change Password if all above is true

            
        }
?>


<?php include('partials/footer.php'); ?>