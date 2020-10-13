<?php include "includes/admin_header.php" ?>
<body>
<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>
<div class="container-fluid">
<!-- Page header -->
    <div class="jumbotron jumbotron-fluid mt-2 p-2">
        <div class="container">
            <h1 class="display-4"><?php echo "Welcome " . $_SESSION['wbs_username'] ?></h1>
            <p class="lead">You have access to the backend of the Weddings Booking System</p>
        </div>
    </div>
    <div class="row">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Unbooked Customers 
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                    <?php 
$query = "SELECT * FROM customers_details WHERE wedding_booked = 0";
$select_all_unbooked_events = mysqli_query($connection,$query);
echo $total_unbooked_events = mysqli_num_rows($select_all_unbooked_events);



?>



                    </h5>
                   
                    
                    
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
    <?php include "sidebar.php" ?>
    </div>
</div>
<!-- /.container-fluid -->



<?php include "includes/admin_footer.php" ?>


</body>

</html>
