<?php 
    $query = "SELECT * FROM customers_details WHERE wedding_booked = 0 ORDER BY date_added ASC";
    $select_unbooked_customers = mysqli_query($connection, $query);
    $count = mysqli_num_rows($select_unbooked_customers); // Counts the returned query
?>

<div class="card-body">
    <?php if($count > 0){?>
    <h5 class="card-title">
    Unbooked Customers 
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
            while($row = mysqli_fetch_assoc($select_unbooked_customers)) 
            {
            $customer_id = $row['customer_id'];
            $brides_forename = $row['brides_forename'];
            $brides_surname = $row['brides_surname'];
            $grooms_forename = $row['grooms_forename'];
            $grooms_surname = $row['grooms_surname'];
            $preferred_contact = $row['preferred_contact'];
            $short_couple = $brides_forename . " & " . $grooms_forename;

            echo "<tr>";
            echo "<td>$short_couple</td>";
            echo "<td>$preferred_contact</td>";
            echo "<td><a class='btn btn-primary btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a></td>"; // Edit
            echo "</tr>";
            }
            ?>
        </tbody>
        </table>
        <?php } else { ?>
                <h5 class="card-title">
    You have No Outstanding Bookings.
    </h5>
            <?php } ?>  
</div>