<form action="" method="post">
        <?php 
            if($total_unbooked_events == 0)
            {
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
                        $couple = $brides_forename . " " . $brides_surname . " & " . $grooms_forename . " " . $grooms_surname ;
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
            <input type="submit" class="btn btn-primary btn-block" name="create_appointment" id="" Value="Set Appointment">
        </div>
                <?php } ?>
        </form>

    <!-- Unrequired Fields 
        
    <div class="form-group">
        <label for="event_hold_till_date">Hold Till Date</label>
        <input type="date" name="event_hold_till_date" id="" class="form-control">
    </div> 

    <div class="form-group">
        <label for="event_contract_issued_date">Contract Issued Date</label>
        <input type="date" name="event_contract_issued_date" id="" class="form-control">
    </div> 

    <div class="form-group">
        <label for="event_function_date">Wedding Date</label>
        <input type="date" name="event_function_date" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="event_deposit_taken_date">Deposit Taken Date</label>
        <input type="date" name="event_deposit_taken_date" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="event_25_due_date">25% Payment Due Date</label>
        <input type="date" name="event_25_due_date" id="" class="form-control">
    </div> 

    <div class="form-group">
        <label for="event_final_wedding_talk_date">Final Wedding Talk Date</label>
        <input type="date" name="event_final_wedding_talk_date" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="event_final_payment_date">Final Payment Date</label>
        <input type="date" name="event_final_payment_date" id="" class="form-control">
    </div> 

    <div class="form-group">
        <label for="event_hold">On Hold?<br></label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="event_hold" id="inlineRadio1" value="1" checked>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_hold" id="inlineRadio2" value="0">
            <label class="form-check-label" for="inlineRadio2">No</label>
        </div>
    </div> -->

    <!-- Unrequired
    <div class="form-group">
        <label for="event_contract_returned">Contract Returned?<br></label>
        <div class="form-check form-check-inline">
           
            <input class="form-check-input" type="radio" name="event_contract_returned" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_contract_returned" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
        </div>
    </div>
  
    <div class="form-group">
        <label for="event_agreement_signed">Agreement Signed?<br></label>
        <div class="form-check form-check-inline">
            
            <input class="form-check-input" type="radio" name="event_agreement_signed" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_agreement_signed" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
            
        </div>
    </div>

    <div class="form-group">
        <label for="event_deposit_taken">Deposit Taken?<br></label>
        <div class="form-check form-check-inline">
           
            <input class="form-check-input" type="radio" name="event_deposit_taken" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_deposit_taken" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
            
        </div>
    </div>

    <div class="form-group">
        <label for="event_25_paid">25% Payment Taken?<br></label>
        <div class="form-check form-check-inline">
            
            <input class="form-check-input" type="radio" name="event_25_paid" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_25_paid" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
           
        </div>
    </div>

    <div class="form-group">
        <label for="event_had_final_talk">Had Final Talk?<br></label>
        <div class="form-check form-check-inline">
       
            <input class="form-check-input" type="radio" name="event_had_final_talk" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_had_final_talk" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
           
        </div>
    </div>

    <div class="form-group">
        <label for="event_cost">cost:</label>
        <input type="text" name="event_cost" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="event_25_amount">25% Amount:</label>
        <input type="text" name="event_25_amount" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="event_paid">Amount Paid:</label>
        <input type="text" name="event_paid" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="event_total_outstanding">Total Outstanding:</label>
        <input type="text" name="event_total_outstanding" id="" class="form-control">
    </div> -->

