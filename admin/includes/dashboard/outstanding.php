<div class="card-body">
                            <h5 class="card-title">
                            Outstanding 25% Costs
                            </h5>
                            <table class="table table-sm table-hover table-borderless">
            <thead class="thead-dark">
                <tr>
                    <th class="align-middle" style="width: 350px;">Couple</th>
                    <th class="align-middle" style="width: 200px;">25% Due Date</th>
                    <th class="align-middle">Options</th>
                    <th class="align-middle">DTG</th>
                </tr>
            </thead>
        <tbody>
        <?php 
        $query = "SELECT * FROM event_details WHERE event_25_paid = 0 ORDER BY event_appointment_date ASC";
        $select_unpaid_25_customers = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_unpaid_25_customers)) 
        {
        $event_customer_id = $row['event_customer_id'];
        $event_25_due_date = $row['event_25_due_date'];

        // Counting down the days left till the event_hold_till_date
        $date = new DateTime($event_25_due_date);
        $now = new DateTime();
        $countdown = $date->diff($now)->format('- %a days to go');
        if($date < $now){
            $downnumber = 0;
        } else {
        $downnumber = $date->diff($now)->format('%a');
        }
        if($downnumber > 0){
            $button_colour = "success"; // Green
        } else {
            $button_colour = "danger"; // Red
        }

        
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
            $short_couple = $brides_forename . " & " . $grooms_forename;

            echo "<tr>";
            echo "<td>$short_couple</td>";
            echo "<td>" . date_format(new DateTime($event_25_due_date),"D d M y") . "</td>";
            echo "<td><a class='btn btn-primary btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a></td>"; // Edit
            echo "<td><button class='btn btn-$button_colour btn-sm'><i class='fas fa-calendar-day'></i> $downnumber</button></td>";
            echo "</tr>";
            }
            ?>
        </tbody>
    </table>              
</div>