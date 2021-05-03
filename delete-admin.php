<?php 

    //include constants.php file here
    include('config/constants.php');

    //Get the id of the admin to be deleted
    $id = $_GET['id'];

    //Create sql query to lete the query
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //EXECUTE the Query
    $res = mysqli_query($conn,$sql);

    //Check whether the query executed successfully or not
    if($res==TRUE)
    {
        //QUery Executed Succesfully and Admin Deleted
        //Create Session Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        //Redirect to Manage Page
        header('location:manage-admin.php');
    }
    else{
        //Failed to Delete Admin
        echo "Failed to Delete Admin";
        $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
        header('location:manage-admin.php');
    }
    //Redirect to Manage admin page with message(success/error) 

?>