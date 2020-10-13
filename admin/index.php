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
        <div class="row mb-2">
            <div class="col-md-4">
                <div class="card h-100 mb-2">
                    <div class="card-header">
                        Unbooked Customers 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM customers_details WHERE wedding_booked = 0";
                            $select_all_unbooked_events = mysqli_query($connection,$query);
                            $total_unbooked_events = mysqli_num_rows($select_all_unbooked_events);

                            if($total_unbooked_events == 0){
                                echo "Everyones Booked";
                            } else { echo $total_unbooked_events;
                
                            }
                        ?>
                        </h5>
                        <p class="card-text"><?php 
                         $query = "SELECT * FROM customers_details WHERE wedding_booked = 0 ORDER BY date_added ASC";

                         $select_unbooked_customers = mysqli_query($connection, $query);

                         while($row = mysqli_fetch_assoc($select_unbooked_customers)) 
                         {
                            $customer_id = $row['customer_id'];
                         $brides_forename = $row['brides_forename'];
                         $brides_surname = $row['brides_surname'];
                         $grooms_forename = $row['grooms_forename'];
                         $grooms_surname = $row['grooms_surname'];
                        
                         echo $brides_forename . " & " . $grooms_forename . " <a class='btn btn-link btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a><br>"; }
                        ?></p>
    
                   </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 mb-2">
                    <div class="card-header">
                        Unsigned Agreements 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM event_details WHERE event_agreement_signed = 0";
                            $select_all_unsigned_agreements = mysqli_query($connection,$query);
                            $total_unsigned_agreements = mysqli_num_rows($select_all_unsigned_agreements);
                            if($total_unsigned_agreements == 0){
                                echo "No Outstanding Agreements";
                            } else { echo $total_unsigned_agreements;
                            uncompletedCustomers($total_unbooked_events);
                            }
                        ?>
                        </h5>
                        <p class="card-text"><?php 
                         $query = "SELECT * FROM event_details WHERE event_agreement_signed = 0 ORDER BY event_appointment_date ASC";

                         $select_unsigned_customers = mysqli_query($connection, $query);

                         while($row = mysqli_fetch_assoc($select_unsigned_customers)) 
                         {
                         $event_customer_id = $row['event_customer_id'];
                         $query = "SELECT * FROM customers_details WHERE customer_id = '$event_customer_id'";
                         $select_all_customers_unsigned = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_all_customers_unsigned)) 
                            {
                                $customer_id = $row['customer_id'];
                                $brides_forename = $row['brides_forename'];
                                $brides_surname = $row['brides_surname'];
                                $grooms_forename = $row['grooms_forename'];
                                $grooms_surname = $row['grooms_surname'];
                            }
                         echo $brides_forename . " & " . $grooms_forename . " <a class='btn btn-link btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a><br>"; 
                        }
                        ?></p>
                   </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 mb-2">
                    <div class="card-header">
                        Unpaid Deposits 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM event_details WHERE event_deposit_taken = 0 ";
                            $select_all_outstanding_deposits = mysqli_query($connection,$query);
                            $total_outstanding_deposits = mysqli_num_rows($select_all_outstanding_deposits);
                            if($total_outstanding_deposits == 0){
                                echo "No Outstanding Deposits";
                            } else { echo $total_outstanding_deposits;
                            uncompletedCustomers($total_unbooked_events);
                            }
                        ?>
                        </h5>
                        <p class="card-text"><?php 
                         $query = "SELECT * FROM event_details WHERE event_deposit_taken = 0 ORDER BY event_appointment_date ASC";

                         $select_unpaid_deposits_customers = mysqli_query($connection, $query);

                         while($row = mysqli_fetch_assoc($select_unpaid_deposits_customers)) 
                         {
                         $event_customer_id = $row['event_customer_id'];
                         $query = "SELECT * FROM customers_details WHERE customer_id = '$event_customer_id'";
                         $select_all_unpaid_deposits_customers = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_all_unpaid_deposits_customers)) 
                            {
                                $customer_id = $row['customer_id'];
                                $brides_forename = $row['brides_forename'];
                                $brides_surname = $row['brides_surname'];
                                $grooms_forename = $row['grooms_forename'];
                                $grooms_surname = $row['grooms_surname'];
                            }
                         echo $brides_forename . " & " . $grooms_forename . " <a class='btn btn-link btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a><br>"; 
                        }
                        ?></p>
                   </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-4">
                <div class="card h-100 mb-2">
                    <div class="card-header">
                        Outstanding 25% Costs
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM event_details WHERE event_25_paid = 0";
                            $select_all_unpaid_25 = mysqli_query($connection,$query);
                            $total_unpaid_25 = mysqli_num_rows($select_all_unpaid_25);
                            if($total_unpaid_25 == 0){
                                echo "No Outstanding 25% Costs";
                            } else { echo $total_unpaid_25;
                            uncompletedCustomers($total_unbooked_events);
                            }
                        ?>
                        </h5>
                        <p class="card-text"><?php 
                         $query = "SELECT * FROM event_details WHERE event_25_paid = 0 ORDER BY event_appointment_date ASC";

                         $select_unpaid_25_customers = mysqli_query($connection, $query);

                         while($row = mysqli_fetch_assoc($select_unpaid_25_customers)) 
                         {
                         $event_customer_id = $row['event_customer_id'];
                         $query = "SELECT * FROM customers_details WHERE customer_id = '$event_customer_id'";
                         $select_all_unpaid_25_customers = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_all_unpaid_25_customers)) 
                            {
                                $customer_id = $row['customer_id'];
                                $brides_forename = $row['brides_forename'];
                                $brides_surname = $row['brides_surname'];
                                $grooms_forename = $row['grooms_forename'];
                                $grooms_surname = $row['grooms_surname'];
                            }
                         echo $brides_forename . " & " . $grooms_forename . " <a class='btn btn-link btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a><br>"; 
                        }
                        ?></p>
                   </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 mb-2">
                    <div class="card-header">
                        Final Talks To Have 
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                        <?php 
                            $query = "SELECT * FROM event_details WHERE event_had_final_talk = 0";
                            $select_all_final_talks_left = mysqli_query($connection,$query);
                            $total_final_talks_left = mysqli_num_rows($select_all_final_talks_left);
                            if($total_final_talks_left == 0){
                                echo "No Final Talks Left";
                            } else { echo $total_final_talks_left;
                            uncompletedCustomers($total_unbooked_events);
                            }
                        ?>
                        </h5>
                        <p class="card-text"><?php 
                         $query = "SELECT * FROM event_details WHERE event_had_final_talk = 0 ORDER BY event_appointment_date ASC";

                         $select_need_final_talk_customers = mysqli_query($connection, $query);

                         while($row = mysqli_fetch_assoc($select_need_final_talk_customers)) 
                         {
                         $event_customer_id = $row['event_customer_id'];
                         $query = "SELECT * FROM customers_details WHERE customer_id = '$event_customer_id'";
                         $select_all_need_final_talk_customers = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_all_need_final_talk_customers)) 
                            {
                                $customer_id = $row['customer_id'];
                                $brides_forename = $row['brides_forename'];
                                $brides_surname = $row['brides_surname'];
                                $grooms_forename = $row['grooms_forename'];
                                $grooms_surname = $row['grooms_surname'];
                            }
                         echo $brides_forename . " & " . $grooms_forename . " <a class='btn btn-link btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a><br>"; 
                        }
                        ?></p>
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
