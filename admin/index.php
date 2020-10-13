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
                <div class="card  mb-2">
                    <div class="card-header">
                        Unbooked Customers 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM customers_details WHERE wedding_booked = 0";
                            $select_all_unbooked_events = mysqli_query($connection,$query);
                            echo $total_unbooked_events = mysqli_num_rows($select_all_unbooked_events);
                            uncompletedCustomers();
                        ?>
                        </h5>
                   </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card  mb-2">
                    <div class="card-header">
                        Unsigned Agreements 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM event_details WHERE event_agreement_signed = 0";
                            $select_all_unsigned_agreements = mysqli_query($connection,$query);
                            echo $total_unsigned_agreements = mysqli_num_rows($select_all_unsigned_agreements);
                            uncompletedCustomers();
                        ?>
                        </h5>
                   </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card  mb-2">
                    <div class="card-header">
                        Unpaid Deposits 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM event_details WHERE event_deposit_taken = 0";
                            $select_all_outstanding_deposits = mysqli_query($connection,$query);
                            echo $total_outstanding_deposits = mysqli_num_rows($select_all_outstanding_deposits);
                            uncompletedCustomers();
                        ?>
                        </h5>
                   </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card  mb-2">
                    <div class="card-header">
                        Outstanding 25% Costs
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM event_details WHERE event_25_paid = 0";
                            $select_all_unpaid_25 = mysqli_query($connection,$query);
                            echo $total_unpaid_25 = mysqli_num_rows($select_all_unpaid_25);
                            uncompletedCustomers();
                        ?>
                        </h5>
                   </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card  mb-2">
                    <div class="card-header">
                        Final Talks To Have 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM event_details WHERE event_had_final_talk = 0";
                            $select_all_final_talks_left = mysqli_query($connection,$query);
                            echo $total_final_talks_left = mysqli_num_rows($select_all_final_talks_left);
                            uncompletedCustomers();
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
