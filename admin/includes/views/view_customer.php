<?php
$style_yes = "class='card-text text-success'";
$style_no = "class='card-text text-danger'";

if(isset($_GET['view_customer'])) {
    $the_customer_id = $_GET['view_customer'];
}
    $query = "SELECT * FROM customers_details WHERE customer_id = $the_customer_id";
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
    $date_added = $row['date_added'];
    $wedding_booked = $row['wedding_booked'];

    }

    $query = "SELECT * FROM event_details WHERE event_customer_id = $customer_id";
    $select_event = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_event)) 
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
    $event_final_payment_date = $row['event_final_payment_date'];
    $event_hold = $row['event_hold'];
    $event_contract_returned = $row['event_contract_returned'];
    $event_agreement_signed = $row['event_agreement_signed'];
    $event_deposit_taken = $row['event_deposit_taken'];
    $event_25_paid = $row['event_25_paid'];
    $event_had_final_talk = $row['event_had_final_talk'];
    $event_cost = $row['event_cost'];
    $event_deposit_amount = $row['event_deposit_amount'];

    $event_25_amount = $row['event_25_amount'];
    $event_paid = $row['event_paid'];
    $event_total_outstanding = $row['event_total_outstanding'];
    $event_notes = $row['event_notes'];

        if($event_hold == 1) {
            $event_hold = "Yes";
            $style_hold = $style_yes;
        } else {
            $event_hold = "No";
            $style_hold = $style_no;
        }

        if($event_contract_returned == 1) {
            $event_contract_returned = "Yes";
            $style_contract_returned = $style_yes;
        } else {
            $event_contract_returned = "No";
            $style_contract_returned = $style_no;
        }

        if($event_agreement_signed == 1) {
            $event_agreement_signed = "Yes";
            $style_agreement_signed = $style_yes;
        } else {
            $event_agreement_signed = "No";
            $style_agreement_signed = $style_no;
        }

        if($event_deposit_taken == 1) {
            $event_deposit_taken = "Yes";
            $style_deposit_taken = $style_yes;
        } else {
            $event_deposit_taken = "No";
            $style_deposit_taken = $style_no;
        }

        if($event_25_paid == 1) {
            $event_25_paid = "Yes";
            $style_25_paid = $style_yes;
        } else {
            $event_25_paid = "No";
            $style_25_paid = $style_no;
        }

        if($event_had_final_talk == 1) {
            $event_had_final_talk = "Yes";
            $style_had_final_talk = $style_yes;
        } else {
            $event_had_final_talk = "No " . "<a class='btn btn-link btn-sm' role='button' href='index.php?change_had_final_talk={$customer_id}'><i class='fas fa-check-circle'></i> Had Talk</a>";
            $style_had_final_talk = $style_no;
        }

    }

                            

    if(isset($_POST['edit_customer'])) 
    {
    
        $brides_forename = $_POST['brides_forename'];
        $brides_surname = $_POST['brides_surname'];
        $brides_telephone = $_POST['brides_telephone'];
        $brides_email = $_POST['brides_email'];
        $grooms_forename = $_POST['grooms_forename'];
        $grooms_surname = $_POST['grooms_surname'];
        $grooms_telephone = $_POST['grooms_telephone'];
        $grooms_email = $_POST['grooms_email'];
        $preferred_contact = $_POST['preferred_contact'];
        $address_1 = $_POST['address_1'];
        $address_2 = $_POST['address_2'];
        $town_city = $_POST['town_city'];
        $county = $_POST['county'];
        $post_code = $_POST['post_code'];
        $wedding_booked = $_POST['wedding_booked'];
        

        $query = "UPDATE customers_details SET ";
        $query .= "brides_forename = '{$brides_forename}', ";
        $query .= "brides_surname = '{$brides_surname}', ";
        $query .= "brides_telephone = '{$brides_telephone}', ";
        $query .= "brides_email = '{$brides_email}', ";
        $query .= "grooms_forename = '{$grooms_forename}', ";
        $query .= "grooms_surname = '{$grooms_surname}', ";
        $query .= "grooms_telephone = '{$grooms_telephone}', ";
        $query .= "grooms_email = '{$grooms_email}', ";
        $query .= "preferred_contact = '{$preferred_contact}', ";
        $query .= "address_1 = '{$address_1}', ";
        $query .= "address_2 = '{$address_2}', ";
        $query .= "town_city = '{$town_city}', ";
        $query .= "county = '{$county}', ";
        $query .= "post_code = '{$post_code}', ";
        $query .= "wedding_booked = '{$wedding_booked}' ";

        $query .= "WHERE customer_id = {$the_customer_id} ";
    
        $update_customer_query = mysqli_query($connection, $query);
    
        confirmsQuery($update_customer_query); // Calls a function so that i can refer
        header("Refresh:0"); // Refreshes Page 
        
    }


?>

<div class="jumbotron jumbotron-fluid mt-2 p-2">
            <div class="container">
                <h1 class="display-4"><?php echo $brides_forename . " " . $brides_surname ." & " . $grooms_forename . " " . $grooms_surname;?></h1>
                <p class="lead"><?php if($wedding_booked == 0) { echo "No Wedding Booked Yet" ;} else { echo "Wedding booked for " . date_format(new DateTime($event_function_date),"D d M y"); }?></p>
            </div>
        </div>
<?php 
// Countdown till the day of the wedding
if(isset($event_function_date)){
$date = new DateTime($event_function_date);
$now = new DateTime();
}
?>


<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    Bride & Groom
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-12 col-md-6 mb-4">
                            <h5 class="card-title"><?php echo $brides_forename . " " . $brides_surname; ?></h5>
                            <p class="card-text"><?php echo $brides_telephone . "<br>" . $brides_email; ?></p>
                        </div>
                        <div class="col-xs-12 col-md-6 mb-4">
                            <h5 class="card-title"><?php echo $grooms_forename . " " . $grooms_surname; ?></h5>
                            <p class="card-text"><?php echo $grooms_telephone . "<br>" . $grooms_email; ?></p>
                        </div>
                    </div>
                    <h5 class="card-title">Address & Preferred Contact</h5>
                    <p class="card-text"><?php echo $address_1 . "<br>" . $address_2 . "<br>" . $town_city. "<br>" . $county. "<br>" . $post_code; ?></p>
                    <p class="card-text"><?php echo $preferred_contact; ?></p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-md-6 mb-4">
            <div class="card h-100" style="min-height: 22rem;">
            <div class="card-header">
                    Event Details <?php  if(isset($event_function_date)){echo $date->diff($now)->format("- %a days to go");}?>
                </div>
                <div class="card-body">
                <h5 class="card-title"><?php if($wedding_booked == 0) { echo "" ;} else { echo "Wedding booked for " . date_format(new DateTime($event_function_date),"D d M y"); }?></h5>
                            <div class="row">
                                <div class="col-xs-12 col-md-12">
                                    <?php if($wedding_booked == 0) { 
                                    echo "<h5>No Appointment Booked Yet</h5><br>"; } else { ?>
                                <p class="card-text">First Appointment: <?php echo date_format(new DateTime($event_appointment_date),"D d M y");?>
                                <br>Hold Till: <?php echo date_format(new DateTime($event_hold_till_date),"D d M y");?>
                                <br>Contract Issued Date: <?php echo date_format(new DateTime($event_contract_issued_date),"D d M y");?>
                                <br>Deposit Taken Date: <?php echo date_format(new DateTime($event_deposit_taken_date),"D d M y");?>
                                <br>25% Payment Due Date: <?php echo date_format(new DateTime($event_25_due_date),"D d M y");?>
                                <br>Final Wedding Talk Date: <?php echo date_format(new DateTime($event_final_wedding_talk_date),"D d M y");?>
                                <br>Final Payment Date: <?php echo date_format(new DateTime($event_final_payment_date),"D d M y");?></p>
                                <hr>
                                <div class="row"> 
                                    <div class="col-xs-12 col-md-6">                        
                                <p <?php echo "<span " . $style_contract_returned; ?>>Contract Returned: <?php echo $event_contract_returned; ?></span>
                                <br><?php echo "<span " . $style_agreement_signed; ?>>Agreement Signed: <?php echo $event_agreement_signed;?></span>
                                <br><?php echo "<span " . $style_deposit_taken; ?>>Deposit Taken: <?php echo $event_deposit_taken;?></span>
                                <br><?php echo "<span " . $style_25_paid; ?>>25% Payment Paid: <?php echo $event_25_paid;?></span>
                                <br><?php echo "<span " . $style_had_final_talk; ?>>Had Final Talk: <?php echo $event_had_final_talk;?></span></p>
                                    <?php } ?>
                                    </div> 
                                    <div class="col-xs-12 col-md-6">

                                    <p class="text-right">Event Cost: £<?php echo $event_cost; ?>
                                    <br>Deposit Amount: £<?php echo $event_deposit_amount ;?>
                                    <br>25% Amount: £<?php echo $event_25_amount;?>
                                    <br>Paid: £<?php echo $event_paid;?>
                                    <br>Outstanding: £<?php echo $event_total_outstanding;?></p>
                                    </div>
                                    </div> 
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col mb-4">
            <div class="accordion" id="accordionExample">
                <div class="card h-100">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Event Details
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            <h5 class="card-title"><?php if($wedding_booked == 0) { echo "No Wedding Booked Yet" ;} else { echo "Event Notes "; }?></h5>
                            <div class="row">
                           <?php if(isset($_POST['edit_notes'])) 
                                {
                                    $event_notes = $_POST['event_notes'];

                                    $query = "UPDATE event_details SET ";
                                    $query .= "event_notes = '{$event_notes}' ";
                                    $query .= "WHERE event_id = {$event_id} ";
                                
                                    $update_event_notes_query = mysqli_query($connection, $query);
                                    confirmsQuery($update_event_notes_query); // Calls a function so that i can refer
                                    header("Refresh:0"); // Refreshes Page 
                                }
                                    ?>                      
                                <form action="" method="post" class="w-100">
                                    <div class="form-group">
                                <textarea class="form-control" name="event_notes" id="body" col="110" rows="15">
                                <?php echo $event_notes ?>
                                </textarea>
                                </div>
                                <div class="form-group"><input type="submit" class="btn btn-primary" name="edit_notes" id="" Value="Save Notes"></div>
                                </form>  
                                
                            </div>
                        </div>
                    </div>
                </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Money Trail
            </button>
        </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="card-body">
                Money Trail goes here.
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
        <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Edit Customer Details
            </button>
        </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <?php include "includes/forms/formeditcustomer.php" ?>
            </div>
        </div>
    </div>
</div>
