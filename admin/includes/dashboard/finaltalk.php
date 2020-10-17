<div class="card-body">
                            <h5 class="card-title">
                            Final Talks To Have
                            </h5>
                            <table class="table table-sm table-hover table-borderless">
            <thead class="thead-dark">
                <tr>
                    <th class="align-middle" style="width: 350px;">Couple</th>
                    <th class="align-middle" style="width: 200px;">Final Meeting Date</th>
                    <th class="align-middle">Options</th>
                    <th class="align-middle">DTG</th>
                </tr>
            </thead>
        <tbody>
            <?php 
            $query = "SELECT * FROM event_details WHERE event_had_final_talk = 0 ORDER BY event_appointment_date ASC";

            $select_need_final_talk_customers = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_need_final_talk_customers)) 
            {
            $event_customer_id = $row['event_customer_id'];
            $event_final_wedding_talk_date = $row['event_final_wedding_talk_date'];
            
            // Counting down the days left till the event_hold_till_date
            $date = new DateTime($event_final_wedding_talk_date);
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
            $select_all_need_final_talk_customers = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_all_need_final_talk_customers)) 
                {
                    $customer_id = $row['customer_id'];
                    $brides_forename = $row['brides_forename'];
                    $brides_surname = $row['brides_surname'];
                    $grooms_forename = $row['grooms_forename'];
                    $grooms_surname = $row['grooms_surname'];
                }

                if(isset($_GET['change_had_final_talk'])) {
                            
                    $customer_id = $_GET['change_had_final_talk'];
                    $query = "UPDATE event_details SET event_had_final_talk = 1 WHERE event_customer_id = $customer_id";
                    $change_had_final_talk = mysqli_query($connection, $query);
                    confirmsQuery($change_had_final_talk);
                    
                    header("Location: index.php"); // Refreshes Page
                    }

                $short_couple = $brides_forename . " & " . $grooms_forename;

                echo "<tr>";
                echo "<td>$short_couple</td>";
                echo "<td>" . date_format(new DateTime($event_final_wedding_talk_date),"D d M y") . "</td>";
                echo "<td><a class='btn btn-primary btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a> <a class='btn btn-success btn-sm' role='button' href='index.php?change_had_final_talk={$customer_id}'><i class='fas fa-check-circle'></i> Had Talk</a></td>"; // Edit
                echo "<td><button class='btn btn-$button_colour btn-sm'><i class='fas fa-calendar-day'></i> $downnumber</button></td>";
                echo "</tr>";
                }
                ?>
        </tbody>
    </table>  
</div>