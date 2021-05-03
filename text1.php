<?php
include_once 'config/constants.php';

// fetch files
$sql = "select * from tbl_files";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
    <!-- Menu Section Starts-->
        <div class="menu" style="background-color: #ff6b81;">
            <div class="wrapper">
                <h1 style="color: white;">TEXT1</h1>
            </div>
        </div>
        <br>
    <!--Menu Section Ends-->

    <!--Main content Starts-->
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <legend>Select File to Upload:</legend>
            <hr>
            <div class="form-group">
                <input type="file" name="file1" />
                <br>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Upload" class="btn btn-info"/>
            </div>
            <?php if(isset($_GET['st'])) { ?>
                <div class="alert alert-danger text-center">
                <?php if ($_GET['st'] == 'success') {
                        echo "File Uploaded Successfully!";
                    }
                    else
                    {
                        echo 'Invalid File Extension!';
                    } ?>
                </div>
            <?php } ?>
        </form>
        </div>
    </div>

    <?php  
        if(isset($_SESSION['del']))
        {
            echo "<br><br>";
            echo $_SESSION['del'];
            unset($_SESSION['del']);
        }
    ?>
    
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['filename']; ?></td>
                        <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                        <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download</td>
                        <td><a href="<?php echo 'http://localhost/my-records/'; ?>delete-file.php?id=<?php echo $row['id'];?>">Delete</a></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Main Content Ends-->



<?php include('partials/footer.php'); ?>
