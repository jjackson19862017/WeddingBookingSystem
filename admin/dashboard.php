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

                                if(isset($_GET['change_is_agreement_signed'])) {
                                            
                                    $customer_id = $_GET['change_is_agreement_signed'];
                                    $query = "UPDATE event_details SET event_contract_returned = 1 WHERE event_customer_id = $customer_id";
                                    $change_contract_returned = mysqli_query($connection, $query);
                                    confirmsQuery($change_contract_returned);
                                    $query = "UPDATE event_details SET event_agreement_signed = 1 WHERE event_customer_id = $customer_id";
                                    $change_is_agreement_signed = mysqli_query($connection, $query);
                                    confirmsQuery($change_is_agreement_signed);
                                    header("Location: index.php"); // Refreshes Page
                                    }
                            echo $brides_forename . " & " . $grooms_forename . " <a class='btn btn-link btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a> <a class='btn btn-link btn-sm' role='button' href='index.php?change_is_agreement_signed={$customer_id}'><i class='fas fa-check-circle'></i> Signed</a><br>"; 
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