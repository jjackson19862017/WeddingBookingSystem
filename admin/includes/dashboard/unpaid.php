<?php 
$query = "SELECT * FROM event_details WHERE event_deposit_taken = 0 ORDER BY event_appointment_date ASC";
$select_unpaid_deposits_customers = mysqli_query($connection, $query);
$count = mysqli_num_rows($select_unpaid_deposits_customers); // Counts the returned query
?>


<div class="card-body">
    <?php if($count > 0){?>
    <h5 class="card-title">
    Unpaid Deposits 
    </h5>
    <table class="table table-sm table-hover table-borderless">
        <thead class="thead-dark">
            <tr>
                <th class="align-middle" style="width: 350px;">Couple</th>
                <th class="align-middle" style="width: 200px;">Contact Number</th>
                <th class="align-middle">Options</th>
            </tr>
        </thead>
    <tbody>
                                

    <?php 
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
    $short_couple = $brides_forename . " & " . $grooms_forename;

    echo "<tr>";
    echo "<td>$short_couple</td>";
    echo "<td>$preferred_contact</td>";
    echo "<td><a class='btn btn-primary btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a></td>"; // Edit
    echo "</tr>";
}
?>   </tbody>
</table> 
<?php } else { ?>
                <h5 class="card-title">
    You have No Unpaid Deposits.
    </h5>
            <?php } ?>
                    </div>