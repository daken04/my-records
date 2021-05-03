<?php
    //include connection file
    include('config/constants.php');
    
    $id = $_GET['id'];

    $sql= "DELETE FROM tbl_files WHERE id=$id ";
    $res = mysqli_query($conn,$sql);

    $sql2 = "SELECT * FROM tbl_files";
    $result = mysqli_query($conn,$sql2);
    $row = mysqli_fetch_assoc($result);

    $filename = $row['filename'];
    $DeletePath = "uploads/".$filename;
    unlink($DeletePath);

    if($res==TRUE)
    {
        $_SESSION['del'] = "<div class='success'>File Deleted Successfully</div>";
        header('location:  text1.php');
    }
    else
    {
        $_SESSION['del'] = "<div class='error'>Failed to delete File</div>";
        header('location:  text1.php');
    }
?>