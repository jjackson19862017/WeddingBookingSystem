<?php

    if(isset($_POST['create_wedding'])) 
    {
    
        $event_customer_id = $_POST['event_customer_id'];
        $event_appointment_date = $_POST['event_appointment_date'];
        $event_hold_till_date = $_POST['event_hold_till_date'];
        $event_contract_issued_date = $_POST['event_contract_issued_date'];
        $event_function_date = $_POST['event_function_date'];
        $event_deposit_taken_date = $_POST['event_deposit_taken_date'];
        $event_25_due_date = $_POST['event_25_due_date'];
        $event_final_wedding_talk_date = $_POST['event_final_wedding_talk_date'];
        $event_final_payment_date = $_POST['event_final_payment_date'];
        $event_hold = $_POST['event_hold'];
        $event_contract_returned = $_POST['event_contract_returned'];
        $event_agreement_signed = $_POST['event_agreement_signed'];
        $event_deposit_taken = $_POST['event_deposit_taken'];
        $event_25_paid = $_POST['event_25_paid'];
        $event_had_final_talk = $_POST['event_had_final_talk'];
        $event_subtotal = $_POST['event_subtotal'];
        $event_25_amount = $_POST['event_25_amount'];
        $event_paid = $_POST['event_paid'];
        $event_total_outstanding = $_POST['event_total_outstanding'];

        $query = "INSERT INTO event_details(event_customer_id, event_appointment_date, event_hold_till_date, event_contract_issued_date, event_function_date, event_deposit_taken_date, event_25_due_date, event_final_wedding_talk_date, event_final_payment_date, event_hold, event_contract_returned, event_agreement_signed, event_deposit_taken, event_25_paid, event_had_final_talk, event_subtotal,event_25_amount,event_paid,event_total_outstanding) ";
        $query .= "VALUES('{$event_customer_id}','{$event_appointment_date}','{$event_hold_till_date}','{$event_contract_issued_date}','{$event_function_date}','{$event_deposit_taken_date}','{$event_25_due_date}','{$event_final_wedding_talk_date}', '{$event_final_payment_date}', '{$event_hold}', '{$event_contract_returned}','{$event_agreement_signed}','{$event_deposit_taken}','{$event_25_paid}','{$event_had_final_talk}', '{$event_subtotal}','{$event_25_amount}','{$event_paid}','{$event_total_outstanding}') ";

        $create_wedding_query = mysqli_query($connection, $query);

        confirmsQuery($create_wedding_query); // Calls a function so that i can refer 
    }


?>

<div class="col-xs-12 col-md-6">

<form class="well" action="" method="post" novalidate>


    <div class="form-group">
        <label for="event_customer_id">Bride and Groom</label>
        <input type="text" name="event_customer_id" id="" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="event_appointment_date">First Appointment Date</label>
        <input type="date" name="event_appointment_date" id="" class="form-control">
    </div>

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
    </div>

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
        <label for="event_subtotal">Subtotal:</label>
        <input type="text" name="event_subtotal" id="" class="form-control">
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
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_wedding" id="" Value="Insert Wedding">
    </div>

</form>
</div>