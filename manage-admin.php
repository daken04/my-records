<?php 
    include('partials/menu.php');
    include('config/constants.php');
?>
    
    <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Admin</h1>
               
                <?php
                    if(isset($_SESSION['add']))
                    {
                        echo "<br><br>";
                        echo $_SESSION['add'];//Displaying session Message
                        unset($_SESSION['add']);//removing session mesaage
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo "<br><br>";
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo "<br><br>";
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }
                ?>
                <br>
                <!-- Button to add admin-->
                <br/>
                <a href="add-admin.php" class="btn-primary">Add Admin</a>
                <br><br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Query to get all admin
                        $sql = "SELECT * FROM tbl_admin";

                        //Execute the Query
                        $res = mysqli_query($conn,$sql);

                        //Check whether the Query is Executed or not
                        if($res==TRUE)
                        {
                            //Count rows to check if we have data in database or not
                            $count = mysqli_num_rows($res); // function to getall the rows in the database 

                            //Check the num of rows
                            if($count>0)
                            {
                                $sn =1; //Create a variable and assign the value

                                //we have data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using while loop to get all the data from database
                                    //And while loop will run as long as we have data in database

                                    //Get indivdual data
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];

                                    //Display our values in our table
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++?></td>
                                        <td><?php echo $full_name;?></td>
                                        <td><?php echo $username;?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>delete-admin.php?id=<?php echo $id; ?>" class="btn-danger">Delete Admin</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            else{
                                //we do not have data in database
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    <!-- Main Content Section Ends -->

<?php include('partials/footer.php')?>