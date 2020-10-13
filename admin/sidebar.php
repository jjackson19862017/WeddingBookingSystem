<?php

    if(isset($_POST['create_wedding'])) 
    {
    
        $event_customer_id = $_POST['event_customer_id'];
        $event_appointment_date = $_POST['event_appointment_date'];
        
        $event_hold_till_date = date_create($event_appointment_date);
        date_add($event_hold_till_date, date_interval_create_from_date_string("14 Days"));
        $event_hold_till_date = date_format($event_hold_till_date,"Y-m-d");
        // $event_contract_returned = $_POST['event_contract_returned'];
        // $event_agreement_signed = $_POST['event_agreement_signed'];
        // $event_deposit_taken = $_POST['event_deposit_taken'];
        // $event_25_paid = $_POST['event_25_paid'];
        
        

        $query = "INSERT INTO event_details(event_customer_id, event_appointment_date, event_hold_till_date, event_hold, event_contract_returned, event_agreement_signed, event_deposit_taken, event_25_paid, event_had_final_talk, event_cost, event_25_amount, event_paid, event_total_outstanding) ";
        $query .= "VALUES('{$event_customer_id}','{$event_appointment_date}','{$event_hold_till_date}', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0) ";

        $create_wedding_query = mysqli_query($connection, $query);

        confirmsQuery($create_wedding_query); // Calls a function so that i can refer 

        $query = "UPDATE customers_details SET wedding_booked = 1 WHERE customer_id = $event_customer_id";
        $wedding_booked_Query = mysqli_query($connection, $query);
        confirmsQuery($wedding_booked_Query);

        header("Location: index.php"); // Refreshes Page 
    }

    


?>


<div class="well">
<form action="" method="post">
            <?php 
           
            
            if($total_unbooked_events == 0){
                        echo "<h5 class='text-center'> There are no weddings to book,<br>please add a couple.</h5>"; 
                        echo "<hr>";
                        echo "<a class='btn btn-block btn-success' role='button' href='customers.php?source=add_customer'><i class='fas fa-user-friends'></i> Add Couple</a>";
            } else { 
            ?>
        <div class="form-row">    
            <div class="form-group col-md-3">
                    <label for="event_customer_id">Couple:</label>
            </div>
            <div class="col-md-9">
                <select name="event_customer_id" id="">
                    <?php 
                        $query = "SELECT * FROM customers_details WHERE wedding_booked = 0";
                        $select_customers_Id = mysqli_query($connection, $query);
                        confirmsQuery($select_customers_Id);
                        while($row = mysqli_fetch_assoc($select_customers_Id)) 
                        { 
                        $customer_id = $row['customer_id'];
                        $brides_forename = $row['brides_forename'];
                        $brides_surname = $row['brides_surname'];
                        $grooms_forename = $row['grooms_forename'];
                        $grooms_surname = $row['grooms_surname'];
                        $couple = $brides_forename . " " . $brides_surname . " and " . $grooms_forename . " " . $grooms_surname ;
                        echo "<option value='$customer_id'>{$couple}</option>";
                        }    
                    ?>
                </select>
            </div>
        </div>
        <!-- /Form-row -->
        <div class="form-row">
            <div class="form-group col-md-7">
                <label class="align-middle" for="event_appointment_date">First Appointment Meeting:</label>
            </div>
            <div class="col-md-5">
                <input type="date" name="event_appointment_date" id="" class="form-control">
            </div>
        </div>
        <!-- /Form-row -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" name="create_wedding" id="" Value="Set Appointment">
        </div>
                <?php } ?>
        </form>
</div>

<div class="well">
<form action="" method="post">
            <?php 
             // Counts all the Rows where Function Date is Null
             $query = "SELECT * FROM event_details WHERE event_function_date IS NULL";
             $select_all_null_function_dates = mysqli_query($connection,$query);
             $total_null_function_dates = mysqli_num_rows($select_all_null_function_dates);
             

            if($total_null_function_dates == 0){
                        echo "<h5 class='text-center'>All Weddings have been booked.</h5>"; 
                        } else { 
            ?>
        <div class="form-row">    
            <div class="form-group col-md-3">
                    <label for="event_customer_id">Couple:</label>
            </div>
            <div class="col-md-9">
                <select name="event_customer_id" id="">
                    <?php 
                        $query = "SELECT * FROM event_details WHERE event_function_date IS NULL";
                        $select_null_event_date = mysqli_query($connection, $query);
                        confirmsQuery($select_null_event_date);
                        while($row = mysqli_fetch_assoc($select_null_event_date)) 
                        {
                        $event_id = $row['event_id'];
                        $event_customer_id = $row['event_customer_id'];
                        }
                        
                        $query= "SELECT * FROM customers_details WHERE customer_id = $event_customer_id";
                        $select_all_null_event_date = mysqli_query($connection, $query);
                        confirmsQuery($select_all_null_event_date);
                        while($row = mysqli_fetch_assoc($select_all_null_event_date)){
                        $brides_forename = $row['brides_forename'];
                        $brides_surname = $row['brides_surname'];
                        $grooms_forename = $row['grooms_forename'];
                        $grooms_surname = $row['grooms_surname'];
                    }

                    if(isset($_POST['add_function_date'])) 
    {
    
        $event_customer_id = $_POST['event_customer_id'];
        $event_function_date = $_POST['event_function_date'];
        $event_25_due_date = date_create($event_function_date);
        $event_final_wedding_talk_date = date_create($event_function_date);
        $event_final_payment_date = date_create($event_function_date);
        $event_contract_issued_date = $_POST['event_contract_issued_date'];

        
        date_sub($event_25_due_date, date_interval_create_from_date_string("90 days"));
        $event_25_due_date = date_format($event_25_due_date,"Y-m-d");
        date_sub($event_final_wedding_talk_date, date_interval_create_from_date_string("42 days"));
        $event_final_wedding_talk_date = date_format($event_final_wedding_talk_date,"Y-m-d");
        date_sub($event_final_payment_date, date_interval_create_from_date_string("30 days"));
        $event_final_payment_date = date_format($event_final_payment_date,"Y-m-d");
        
        

        $query = "UPDATE event_details SET ";
        $query .= "event_function_date = '{$event_function_date}', ";
        $query .= "event_25_due_date = '{$event_25_due_date}', ";
        $query .= "event_final_wedding_talk_date = '{$event_final_wedding_talk_date}', ";
        $query .= "event_contract_issued_date = '{$event_contract_issued_date}', ";
        $query .= "event_final_payment_date = '{$event_final_payment_date}' ";
        $query .= "WHERE event_id = '{$event_id}' ";
        
        $update_event_function_date_query = mysqli_query($connection, $query);
        confirmsQuery($update_event_function_date_query);
        header("Location: index.php"); // Refreshes Page 
        
    }

                        $couple = $brides_forename . " " . $brides_surname . " and " . $grooms_forename . " " . $grooms_surname ;
                        echo "<option value='$event_customer_id'>{$couple}</option>";
                        
                    ?>
                </select>
            </div>
        </div>
        <!-- /Form-row -->
        <div class="form-row">
            <div class="form-group col-md-7">
                <label class="align-middle" for="event_function_date">Set Wedding Date: </label>
            </div>
            <div class="col-md-5">
                <input type="date" name="event_function_date" id="" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label class="align-middle" for="event_contract_issued_date">Contract Issued Date: </label>
            </div>
            <div class="col-md-5">
                <input type="date" name="event_contract_issued_date" id="" class="form-control">
            </div>
        </div>
        <!-- /Form-row -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" name="add_function_date" id="" Value="Insert Wedding Date">
        </div>
                <?php } ?>
        </form>
</div>