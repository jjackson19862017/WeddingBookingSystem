<?php include "includes/admin_header.php" ?>

<?php 
// Takes the submitted Username
if(isset($_SESSION['wbs_username'])) 
{
    $username = $_SESSION['wbs_username'];
    // Reads the wbs_users to look for a username
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
        edit_user($user_id);
    }
}

?>

<body>
<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

<div class="jumbotron jumbotron-fluid mt-2 p-2">
    <div class="container">
        <h1 class="display-4"><?php echo $username ?></h1>
    </div>
</div>
<div class="row">                            
    <div class="col-xs-12 col-md-3"></div>
        <div class="col-xs-12 col-md-6">
            <form class="well" action="" method="post">
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
    </div>
</div>


    <?php include "includes/admin_footer.php" ?>


    </body>

</html>
