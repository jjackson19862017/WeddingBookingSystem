<?php                           
// Looks for all customers that havent booked
$query = "SELECT * FROM customers_details WHERE wedding_booked = 0";
$select_all_unbooked_events = mysqli_query($connection,$query);
$total_unbooked_events = mysqli_num_rows($select_all_unbooked_events);

if($total_unbooked_events == 0){
    $badge_unbooked = "";
} else {
    $badge_unbooked = "<span class='badge badge-secondary'>$total_unbooked_events</span>";
    
}
                                
// Looks for all customers that havent signed their agreements
$query = "SELECT * FROM event_details WHERE event_agreement_signed = 0";
$select_all_unsigned_agreements = mysqli_query($connection,$query);
$total_unsigned_agreements = mysqli_num_rows($select_all_unsigned_agreements);
if($total_unsigned_agreements == 0){
    $badge_unsigned = "";
} else { 
    $badge_unsigned = "<span class='badge badge-secondary'>$total_unsigned_agreements</span>";
// uncompletedCustomers($total_unbooked_events);
}

// Looks for all customers that havent paid their deposits               
$query = "SELECT * FROM event_details WHERE event_deposit_taken = 0 ";
$select_all_outstanding_deposits = mysqli_query($connection,$query);
$total_outstanding_deposits = mysqli_num_rows($select_all_outstanding_deposits);
if($total_outstanding_deposits == 0){
    $badge_outstanding = "";
} else { 
    $badge_outstanding = "<span class='badge badge-secondary'>$total_outstanding_deposits</span>";
    
//uncompletedCustomers($total_unbooked_events);
}

// Looks for all customers that havent paid 25% Costs                 
$query = "SELECT * FROM event_details WHERE event_25_paid = 0";
$select_all_unpaid_25 = mysqli_query($connection,$query);
$total_unpaid_25 = mysqli_num_rows($select_all_unpaid_25);
if($total_unpaid_25 == 0){
    $badge_unpaid = "";
    
} else {
    $badge_unpaid = "<span class='badge badge-secondary'>$total_unpaid_25</span>";

    //uncompletedCustomers($total_unbooked_events);
}

// Looks for all customers that havent had their final talk                 
$query = "SELECT * FROM event_details WHERE event_had_final_talk = 0";
$select_all_final_talks_left = mysqli_query($connection,$query);
$total_final_talks_left = mysqli_num_rows($select_all_final_talks_left);
if($total_final_talks_left == 0){
    $badge_finaltalk = "";

} else { 
    $badge_finaltalk = "<span class='badge badge-secondary'>$total_final_talks_left</span>";
    
// uncompletedCustomers($total_unbooked_events);
}
?>


<div class="card h-100 ">
    <div class="card-header"> 
        <ul class="nav nav-pills card-header-tabs pull-right"  id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="unbooked-tab" data-toggle="tab" href="#unbooked" role="tab" aria-controls="unbooked customers" aria-selected="true">Unbooked <?php echo $badge_unbooked; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="unsignedagreements-tab" data-toggle="tab" href="#unsignedagreements" role="tab" aria-controls="unsigned agreements" aria-selected="false">Unsigned <?php echo $badge_unsigned; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="deposits-tab" data-toggle="tab" href="#deposits" role="tab" aria-controls="Unpaid Deposits" aria-selected="false">Unpaid Deposits <?php echo $badge_outstanding; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="outstanding25-tab" data-toggle="tab" href="#outstanding25" role="tab" aria-controls="Outstanding 25% Costs" aria-selected="false">Outstanding Costs <?php echo $badge_unpaid; ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="finaltalks-tab" data-toggle="tab" href="#finaltalks" role="tab" aria-controls="Final Talks To Have" aria-selected="false">Final Talk <?php echo $badge_finaltalk; ?></a>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="unbooked" role="tabpanel" aria-labelledby="unbooked-tab">
            <?php include "includes/dashboard/unbooked.php" ?>
            </div>
            <div class="tab-pane fade" id="unsignedagreements" role="tabpanel" aria-labelledby="unsignedagreements-tab">
            <?php include "includes/dashboard/unsigned.php" ?>            
            </div>
            <div class="tab-pane fade" id="deposits" role="tabpanel" aria-labelledby="deposits-tab">
            <?php include "includes/dashboard/unpaid.php" ?>
            </div>
            <div class="tab-pane fade" id="outstanding25" role="tabpanel" aria-labelledby="outstanding25-tab">
            <?php include "includes/dashboard/outstanding.php" ?>
            </div>
            <div class="tab-pane fade" id="finaltalks" role="tabpanel" aria-labelledby="finaltalks-tab">
            <?php include "includes/dashboard/finaltalk.php" ?>               
            </div>
        </div>
    </div>
</div>