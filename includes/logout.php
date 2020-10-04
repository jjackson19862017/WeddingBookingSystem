<?php session_start(); ?>

<?php

$_SESSION['wbs_username'] = null;
$_SESSION['wbs_user_role'] = null;

header("Location: ../index.php");

?>

