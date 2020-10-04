<?php include "includes/admin_header.php" ?>

<?php 

if(isset($_SESSION['wbs_username'])) 
    {
$username = $_SESSION['wbs_username'];

        $query = "SELECT * FROM wbs_users WHERE user_username = '{$username}' ";
        $selectuserprofile = mysqli_query($connection, $query);
    
        while($row = mysqli_fetch_array($selectuserprofile)) 
        {
            $user_id = $row['user_id'];
            $user_username = $row['user_username'];
            $user_password = $row['user_password'];
            $user_role = $row['user_role'];
            $user_randSalt = $row['user_randSalt'];
        }
        
        if(isset($_POST['edit_user'])) 
        {
            $user_username = $_POST['user_username'];
            $user_password = $_POST['user_password'];
            $user_role = $_POST['user_role'];
            $user_randSalt = $_POST['user_randSalt'];

            $query = "UPDATE users SET ";
            $query .= "user_username = '{$user_username}', ";
            $query .= "user_password = '{$user_password}', ";
            $query .= "user_role = '{$user_role}', ";
            $query .= "user_randSalt = '{$user_randSalt}' ";
            $query .= "WHERE user_id = {$user_id} ";

    $update_user_query = mysqli_query($connection, $query);

    confirmsQuery($update_user_query); // Calls a function so that i can refer
    header("Location: profile.php"); // Refreshes Page 
    }
}

?>

<body>

   

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>
        

      

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Profile
                        </h1>
                            
                            <div class="col-xs-12 col-md-6">

<form class="well" action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" name="user_username" id="" class="form-control" value="<?php echo $user_username?>">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" id="" class="form-control" value="<?php echo $user_password?>">
    </div>


    <div class="form-group">
        <select name="user_role" id="">
    <?php select_role();?>
        </select>
    </div>

    <div class="form-group">
        <label for="user_randSalt">randSalt</label>
        <input type="text" name="user_randSalt" id="" class="form-control" value="<?php echo $user_randSalt?>">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" id="" Value="Update User">
    </div>

</form>
</div>


    <?php include "includes/admin_footer.php" ?>


</body>

</html>
