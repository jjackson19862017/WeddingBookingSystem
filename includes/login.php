<?php include "db.php" ?>
<?php session_start(); ?>
<?php 

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


 $username = mysqli_real_escape_string($connection, $username);
 $password = mysqli_real_escape_string($connection, $password);


}

$query = "SELECT * FROM wbs_users WHERE user_username = '{$username}'";
    $selectuser = mysqli_query($connection, $query);
    if(!$selectuser) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while($row = mysqli_fetch_assoc($selectuser)) 
    {
        $db_user_id = $row['user_id'];
        $db_user_username = $row['user_username'];
        $db_user_password = $row['user_password'];
        $db_user_role = $row['user_role'];
        $db_user_randSalt = $row['user_randSalt'];
    }

if($username === $db_user_username && $password === $db_user_password) { // Login Successful
    $_SESSION['wbs_username'] = $db_user_username;
    $_SESSION['wbs_user_role'] = $db_user_role;

    header("Location: ../admin/index.php");
} else { // Login Failed
    header("Location: ../index.php");
}
?>