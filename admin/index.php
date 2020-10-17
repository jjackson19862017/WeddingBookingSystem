<?php include "includes/admin_header.php" ?>
<body>
<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>
<div class="container-fluid">
    <!-- Jumbotron header -->
    <div class="jumbotron jumbotron-fluid mt-2 p-2">
        <div class="container">
            <h1 class="display-4"><?php echo "Welcome " . $_SESSION['wbs_username'] ?></h1>
            <p class="lead">You have access to the backend of the Weddings Booking System</p>
        </div>
    </div>

    <div class="row" style="height: 70vh;">
        <!-- Main area that takes up 2/3 thirds of the screen. -->
        <div class="col-md-8">
            <?php include "dashboard2.php" ?> 
        </div>
        <!-- Side area that takes up 1/3 third of the right hand side of the screen. -->
        <div class="col-md-4">
            <?php include "sidebar.php" ?> 
        </div>
    </div>
    <!-- /. Row -->
</div>
<!-- /.container-fluid -->
<?php include "includes/admin_footer.php" ?>
</body>

</html>
