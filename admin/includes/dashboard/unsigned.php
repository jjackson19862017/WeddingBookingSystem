<div class="card-body">
    <h5 class="card-title">
    Unsigned Agreements
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
            $query = "SELECT * FROM event_details WHERE event_agreement_signed = 0 ORDER BY event_appointment_date ASC";

            $select_unsigned_customers = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_unsigned_customers)) 
            {
            $event_customer_id = $row['event_customer_id'];
            $query = "SELECT * FROM customers_details WHERE customer_id = '$event_customer_id'";
            $select_all_customers_unsigned = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_all_customers_unsigned)) 
                {
                    $customer_id = $row['customer_id'];
                    $brides_forename = $row['brides_forename'];
                    $brides_surname = $row['brides_surname'];
                    $grooms_forename = $row['grooms_forename'];
                    $grooms_surname = $row['grooms_surname'];
                    $preferred_contact = $row['preferred_contact'];

                }

                if(isset($_GET['change_is_agreement_signed'])) {
                            
                    $customer_id = $_GET['change_is_agreement_signed'];
                    $query = "UPDATE event_details SET event_contract_returned = 1 WHERE event_customer_id = $customer_id";
                    $change_contract_returned = mysqli_query($connection, $query);
                    confirmsQuery($change_contract_returned);
                    $query = "UPDATE event_details SET event_agreement_signed = 1 WHERE event_customer_id = $customer_id";
                    $change_is_agreement_signed = mysqli_query($connection, $query);
                    confirmsQuery($change_is_agreement_signed);
                    header("Location: index.php"); // Refreshes Page
                    }
            
                    if(isset($_GET['change_is_agreement_signed'])) {
                                            
                        $customer_id = $_GET['change_is_agreement_signed'];
                        $query = "UPDATE event_details SET event_contract_returned = 1 WHERE event_customer_id = $customer_id";
                        $change_contract_returned = mysqli_query($connection, $query);
                        confirmsQuery($change_contract_returned);
                        $query = "UPDATE event_details SET event_agreement_signed = 1 WHERE event_customer_id = $customer_id";
                        $change_is_agreement_signed = mysqli_query($connection, $query);
                        confirmsQuery($change_is_agreement_signed);
                        header("Location: index.php"); // Refreshes Page
                        }


                    $short_couple = $brides_forename . " & " . $grooms_forename;

            echo "<tr>";
            echo "<td>$short_couple</td>";
            echo "<td>$preferred_contact</td>";
            echo "<td><a class='btn btn-primary btn-sm' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a> <a class='btn btn-success btn-sm' role='button' href='index.php?change_is_agreement_signed={$customer_id}'><i class='fas fa-check-circle'></i> Signed</a></td>"; // Edit
            echo "</tr>";
            }
            ?>
        </tbody>
        </table>
    </div>