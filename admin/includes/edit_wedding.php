<?php

if(isset($_GET['edit_wedding'])) {
    $the_event_id = $_GET['edit_wedding'];
    
}
                            $query = "SELECT * FROM event_details WHERE event_id = $the_event_id";

                            $select_events = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_events)) 
                            {
                        
                            $event_id = $row['event_id'];
                            $event_customer_id = $row['event_customer_id'];
                            $event_appointment_date = $row['event_appointment_date'];
                            $event_hold_till_date = $row['event_hold_till_date'];
                            $event_contract_issued_date = $row['event_contract_issued_date'];
                            $event_function_date = $row['event_function_date'];
                            $event_deposit_taken_date = $row['event_deposit_taken_date'];
                            $event_25_due_date = $row['event_25_due_date'];
                            $event_final_wedding_talk_date = $row['event_final_wedding_talk_date'];
                            $event_hold = $row['event_hold'];
                            $event_contract_returned = $row['event_contract_returned'];
                            $event_agreement_signed = $row['event_agreement_signed'];
                            $event_deposit_taken = $row['event_deposit_taken'];
                            $event_25_paid = $row['event_25_paid'];
                            $event_had_final_talk = $row['event_had_final_talk'];
                            $event_subtotal = $row['event_subtotal'];
                            $event_25_amount = $row['event_25_amount'];
                            $event_paid = $row['event_paid'];
                            $event_total_outstanding = $row['event_total_outstanding'];

                            }







    if(isset($_POST['edit_event'])) 
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




        $query = "UPDATE event_details SET ";
        $query .= "event_customer_id = '{$event_customer_id}', ";
        $query .= "event_appointment_date = '{$event_appointment_date}', ";
        $query .= "event_hold_till_date = '{$event_hold_till_date}', ";
        $query .= "event_contract_issued_date = '{$event_contract_issued_date}', ";
        $query .= "event_function_date = '{$event_function_date}', ";
        $query .= "event_deposit_taken_date = '{$event_deposit_taken_date}', ";
        $query .= "event_25_due_date = '{$event_25_due_date}', ";
        $query .= "event_final_wedding_talk_date = '{$event_final_wedding_talk_date}', ";
        $query .= "event_final_payment_date = '{$event_final_payment_date}', ";
        $query .= "event_hold = '{$event_hold}', ";
        $query .= "event_contract_returned = '{$event_contract_returned}', ";
        $query .= "event_agreement_signed = '{$event_agreement_signed}', ";
        $query .= "event_deposit_taken = '{$event_deposit_taken}', ";
        $query .= "event_25_paid = '{$event_25_paid}', ";
        $query .= "event_had_final_talk = '{$event_had_final_talk}', ";
        $query .= "event_subtotal = '{$event_subtotal}', ";
        $query .= "event_25_amount = '{$event_25_amount}', ";
        $query .= "event_paid = '{$event_paid}', ";
        $query .= "event_total_outstanding = '{$event_total_outstanding}' ";

        $query .= "WHERE event_id = {$the_event_id} ";
    
        
        
    
        $update_event_query = mysqli_query($connection, $query);
    
        confirmsQuery($update_event_query); // Calls a function so that i can refer
        header("Location: weddings.php"); // Refreshes Page 
        
    }


?>

<div class="col-xs-12 col-md-12">

<form class="well" action="" method="post" novalidate>

<div class="well">
    <div class="form-group">
        <label for="event_customer_id">Bride and Groom</label>
        <input type="text" name="event_customer_id" id="" class="form-control" value="<?php echo $event_customer_id?>">

    <?php 
    $query = "SELECT * FROM customers_details WHERE customer_id = $event_customer_id";

    $select_customers = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_customers)) 
    {

        $customer_id = $row['customer_id'];
        $brides_forename = $row['brides_forename'];
        $brides_surname = $row['brides_surname'];
        $brides_telephone = $row['brides_telephone'];
        $brides_email = $row['brides_email'];
        $grooms_forename = $row['grooms_forename'];
        $grooms_surname = $row['grooms_surname'];
        $grooms_telephone = $row['grooms_telephone'];
        $grooms_email = $row['grooms_email'];
        $preferred_contact = $row['preferred_contact'];
        $address_1 = $row['address_1'];
        $address_2 = $row['address_2'];
        $town_city = $row['town_city'];
        $county = $row['county'];
        $post_code = $row['post_code'];
    }
    
    echo "<p> $brides_forename $brides_surname, $brides_telephone, $brides_email </p>";
    echo "<p> $grooms_forename $grooms_surname, $grooms_telephone, $grooms_email </p>";

    ?>
    </div>
    </div>
    <div class="form-group">
        <label for="event_appointment_date">First Appointment Date</label>
        <input type="date" name="event_appointment_date" id="" class="form-control" value="<?php echo $event_appointment_date?>">
    </div>

    <div class="form-group">
        <label for="event_hold_till_date">Hold Till Date</label>
        <input type="date" name="event_hold_till_date" id="" class="form-control" value="<?php echo $event_hold_till_date?>" novalidate>
    </div>

    <div class="form-group">
        <label for="event_contract_issued_date">Contract Issued Date</label>
        <input type="date" name="event_contract_issued_date" id="" class="form-control" value="<?php echo $event_contract_issued_date?>" novalidate>
    </div>

    <div class="form-group">
        <label for="event_function_date">Wedding Date</label>
        <input type="date" name="event_function_date" id="" class="form-control"value="<?php echo $event_function_date?>" novalidate>
    </div>

    <div class="form-group">
        <label for="event_deposit_taken_date">Deposit Taken Date</label>
        <input type="date" name="event_deposit_taken_date" id="" class="form-control" value="<?php echo $event_deposit_taken_date?>" novalidate>
    </div>

    <div class="form-group">
        <label for="event_25_due_date">25% Payment Due Date</label>
        <input type="date" name="event_25_due_date" id="" class="form-control" value="<?php echo $event_25_due_date?>" novalidate>
    </div>

    <div class="form-group">
        <label for="event_final_wedding_talk_date">Final Wedding Talk Date</label>
        <input type="date" name="event_final_wedding_talk_date" id="" class="form-control" value="<?php echo $event_final_wedding_talk_date?>" novalidate>
    </div>

    <div class="form-group">
        <label for="event_final_payment_date">Final Payment Date</label>
        <input type="date" name="event_final_payment_date" id="" class="form-control" value="<?php echo $event_final_payment_date?>" novalidate>
    </div>

    <div class="form-group">
        <label for="event_hold">On Hold?<br></label>
        <div class="form-check form-check-inline">
            <?php    
            if($event_hold == 1){
            echo '<input class="form-check-input" type="radio" name="event_hold" id="inlineRadio1" value="1" checked>';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_hold" id="inlineRadio2" value="0">';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; 
            } else {
            echo '<input class="form-check-input" type="radio" name="event_hold" id="inlineRadio1" value="1">';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_hold" id="inlineRadio2" value="0" checked>';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; }
                ?>
        </div>
    </div>

    <div class="form-group">
        <label for="event_contract_returned">Contract Returned?<br></label>
        <div class="form-check form-check-inline">
            <?php    
            if($event_contract_returned == 1){
            echo '<input class="form-check-input" type="radio" name="event_contract_returned" id="inlineRadio1" value="1" checked>';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_contract_returned" id="inlineRadio2" value="0">';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; 
            } else {
            echo '<input class="form-check-input" type="radio" name="event_contract_returned" id="inlineRadio1" value="1">';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_contract_returned" id="inlineRadio2" value="0" checked>';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; }
                ?>
        </div>
    </div>
  
    <div class="form-group">
        <label for="event_agreement_signed">Agreement Signed?<br></label>
        <div class="form-check form-check-inline">
            <?php    
            if($event_agreement_signed == 1){
            echo '<input class="form-check-input" type="radio" name="event_agreement_signed" id="inlineRadio1" value="1" checked>';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_agreement_signed" id="inlineRadio2" value="0">';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; 
            } else {
            echo '<input class="form-check-input" type="radio" name="event_agreement_signed" id="inlineRadio1" value="1">';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_agreement_signed" id="inlineRadio2" value="0" checked>';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; }
                ?>
        </div>
    </div>

    <div class="form-group">
        <label for="event_deposit_taken">Deposit Taken?<br></label>
        <div class="form-check form-check-inline">
            <?php    
            if($event_deposit_taken == 1){
            echo '<input class="form-check-input" type="radio" name="event_deposit_taken" id="inlineRadio1" value="1" checked>';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_deposit_taken" id="inlineRadio2" value="0">';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; 
            } else {
            echo '<input class="form-check-input" type="radio" name="event_deposit_taken" id="inlineRadio1" value="1">';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_deposit_taken" id="inlineRadio2" value="0" checked>';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; }
                ?>
        </div>
    </div>

    <div class="form-group">
        <label for="event_25_paid">25% Payment Taken?<br></label>
        <div class="form-check form-check-inline">
            <?php    
            if($event_25_paid == 1){
            echo '<input class="form-check-input" type="radio" name="event_25_paid" id="inlineRadio1" value="1" checked>';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_25_paid" id="inlineRadio2" value="0">';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; 
            } else {
            echo '<input class="form-check-input" type="radio" name="event_25_paid" id="inlineRadio1" value="1">';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_25_paid" id="inlineRadio2" value="0" checked>';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; }
                ?>
        </div>
    </div>

    <div class="form-group">
        <label for="event_had_final_talk">Had Final Talk?<br></label>
        <div class="form-check form-check-inline">
            <?php    
            if($event_had_final_talk == 1){
            echo '<input class="form-check-input" type="radio" name="event_had_final_talk" id="inlineRadio1" value="1" checked>';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_had_final_talk" id="inlineRadio2" value="0">';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; 
            } else {
            echo '<input class="form-check-input" type="radio" name="event_had_final_talk" id="inlineRadio1" value="1">';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="event_had_final_talk" id="inlineRadio2" value="0" checked>';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; }
                ?>
        </div>
    </div>

    <div class="form-group">
        <label for="event_subtotal">Subtotal:</label>
        <input type="text" name="event_subtotal" id="" class="form-control" value="<?php echo $event_subtotal?>">
    </div>

    <div class="form-group">
        <label for="event_25_amount">25% Amount:</label>
        <input type="text" name="event_25_amount" id="" class="form-control" value="<?php echo $event_25_amount?>">
    </div>

    <div class="form-group">
        <label for="event_paid">Amount Paid:</label>
        <input type="text" name="event_paid" id="" class="form-control" value="<?php echo $event_paid?>">
    </div>

    <div class="form-group">
        <label for="event_total_outstanding">Total Outstanding:</label>
        <input type="text" name="event_total_outstanding" id="" class="form-control" value="<?php echo $event_total_outstanding?>">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_event" id="" Value="Edit Customers Details">
    </div>

</form>
</div>