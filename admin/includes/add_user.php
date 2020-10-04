<?php

    if(isset($_POST['create_user'])) 
    {
    
        $user_username = $_POST['user_username'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
        $user_randSalt = $_POST['user_randSalt'];

        $query = "INSERT INTO wbs_users(user_username, user_password, user_role, user_randSalt) ";
        $query .= "VALUES('{$user_username}','{$user_password}','{$user_role}','{$user_randSalt}' ) ";

        $create_user_query = mysqli_query($connection, $query);

        confirmsQuery($create_user_query); // Calls a function so that i can refer 

        echo "User Created: " . " " . "<a href='users.php'> View Users</a>";
        
    }


?>

<div class="col-xs-12 col-md-6">

<form class="well" action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_username">Username</label>
        <input type="text" name="user_username" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" id="" class="form-control">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
        <?php select_role();?>
        </select>
    </div>

    <div class="form-group">
        <label for="user_randSalt">randSalt</label>
        <input type="text" name="user_randSalt" id="" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" id="" Value="Add User">
    </div>

</form>
</div>