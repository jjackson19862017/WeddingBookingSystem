<?php include "includes/admin_header.php" ?>
<body>
<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="jumbotron jumbotron-fluid mt-2 p-2">
            <div class="container">
                <h1 class="display-4"><?php echo "Welcome " . $_SESSION['wbs_username'] ?></h1>
                <p class="lead">You have access to the backend of the Weddings Booking System</p>
            </div>
        </div>
        
    </div>
<!-- /.container-fluid -->



<?php include "includes/admin_footer.php" ?>


</body>

</html>
