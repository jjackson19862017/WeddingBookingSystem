<form class="well" action="" method="post" >
<div class="row">
    <div class="col-xs-12 col-md-11 well mx-auto">
        <div class="form-group form-inline">
            <label for="event_customer_id">Bride and Groom</label>
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
                    } ?>
                </select>
        </div>
    </div>
</div>


    <div class="row">
        <div class="col-xs-12 col-md-5 well mx-auto">
        <div class="form-group form-inline">
        <label for="event_appointment_date">First Appointment Date</label>
        <input type="date" name="event_appointment_date" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_hold_till_date">Hold Till Date</label>
        <input type="date" name="event_hold_till_date" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_contract_issued_date">Contract Issued Date</label>
        <input type="date" name="event_contract_issued_date" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_function_date">Wedding Date</label>
        <input type="date" name="event_function_date" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_deposit_taken_date">Deposit Taken Date</label>
        <input type="date" name="event_deposit_taken_date" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_25_due_date">25% Payment Due Date</label>
        <input type="date" name="event_25_due_date" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_final_wedding_talk_date">Final Wedding Talk Date</label>
        <input type="date" name="event_final_wedding_talk_date" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_final_payment_date">Final Payment Date</label>
        <input type="date" name="event_final_payment_date" id="" class="form-control">
    </div>
        </div>
        <div class="col-xs-12 col-md-5 well mx-auto">
        <div class="form-group form-inline">
        <label for="event_hold">On Hold?<br></label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="event_hold" id="inlineRadio1" value="1" checked>
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_hold" id="inlineRadio2" value="0">
            <label class="form-check-label" for="inlineRadio2">No</label>
        </div>
    </div>

    <div class="form-group form-inline">
        <label for="event_contract_returned">Contract Returned?<br></label>
        <div class="form-check form-check-inline">
           
            <input class="form-check-input" type="radio" name="event_contract_returned" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_contract_returned" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
        </div>
    </div>
  
    <div class="form-group form-inline">
        <label for="event_agreement_signed">Agreement Signed?<br></label>
        <div class="form-check form-check-inline">
            
            <input class="form-check-input" type="radio" name="event_agreement_signed" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_agreement_signed" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
            
        </div>
    </div>

    <div class="form-group form-inline">
        <label for="event_deposit_taken">Deposit Taken?<br></label>
        <div class="form-check form-check-inline">
           
            <input class="form-check-input" type="radio" name="event_deposit_taken" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_deposit_taken" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
            
        </div>
    </div>

    <div class="form-group form-inline">
        <label for="event_25_paid">25% Payment Taken?<br></label>
        <div class="form-check form-check-inline">
            
            <input class="form-check-input" type="radio" name="event_25_paid" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_25_paid" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
           
        </div>
    </div>

    <div class="form-group form-inline">
        <label for="event_had_final_talk">Had Final Talk?<br></label>
        <div class="form-check form-check-inline">
       
            <input class="form-check-input" type="radio" name="event_had_final_talk" id="inlineRadio1" value="1">
            <label class="form-check-label" for="inlineRadio1">Yes</label>
            <input class="form-check-input" type="radio" name="event_had_final_talk" id="inlineRadio2" value="0" checked>
            <label class="form-check-label" for="inlineRadio2">No</label> 
           
        </div>
    </div>
    <hr>
    <div class="form-group form-inline">
        <label for="event_cost">cost:</label>
        <input type="text" name="event_cost" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_25_amount">25% Amount:</label>
        <input type="text" name="event_25_amount" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_paid">Amount Paid:</label>
        <input type="text" name="event_paid" id="" class="form-control">
    </div>

    <div class="form-group form-inline">
        <label for="event_total_outstanding">Total Outstanding:</label>
        <input type="text" name="event_total_outstanding" id="" class="form-control">
    </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-5 mx-auto">
    

        </div>
        <div class="col-xs-12 col-md-5 well mx-auto">
        <div class="form-group form-inline">
        <input type="submit" class="btn btn-primary btn-block" name="create_wedding" id="" Value="Insert Wedding">
    </div>
        </div>
    </div>
</form>