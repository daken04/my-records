<?php 
    include('partials/menu.php');
    include('config/constants.php');
?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
           if(isset($_SESSION['add'])) //Checking whether the session is set or not
           {
               echo $_SESSION['add']; //Display the session message if set
               unset($_SESSION['add']); //Remove session message
           }
        ?>

        <form action="" method="POST">

        <table class="tbl-30">
            <tr>
               <td>Full Name: </td>
               <td><input type="text" name="full_name" placeholder="Enter you name"></td>
            </tr>

            <tr>
               <td>Username: </td>
               <td><input type="text" name="username" placeholder="Your Username"></td>
            </tr>

            <tr>
               <td>Password: </td>
               <td><input type="password" name="password" placeholder="Your Password"></td>
            </tr>

            <tr>
                <td colspan="2">
                   <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
            </tr>
        </table>
        </form>
    </div>
</div>
<?php include('partials/footer.php'); ?>

<?php
   //Process the value from form and save it in database
   //Check whether the submitbutton is clicked or not

   if(isset($_POST['submit']))
   {
       //button clicked
       //echo "button Clicked"

       //Get the data from form
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];
       $password = md5($_POST['password']);

       //SQL Query to save the data into database
       $sql = "INSERT INTO tbl_admin SET
           full_name = '$full_name',
           username = '$username',
           password = '$password'
       ";

       //Execute query into database
       $res = mysqli_query($conn, $sql) or die(mysqli_error());

       //Check whether the (Query is executed) data is inserted or not
       if($res==TRUE)
       {
           //Data Inserted
           //Create a variable to Display Message
           $_SESSION['add'] = "<div class='success'>Admin Added Succesfully</div>";
           //Redirect page to Manage Admin
           header("location:".SITEURL.'manage-admin.php');  
       }
       else{
           //Failed to insert data
           //Create a variable to Display Message
           $_SESSION['add'] = "<div class='error'>Failed to add Admin</div>";
           //Redirect page to Manage Admin
           header("location:".SITEURL.'add-admin.php'); 
       }
   }
?>
