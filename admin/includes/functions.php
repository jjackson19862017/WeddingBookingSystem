<?php
//Variables used for multiple functions
$style_yes = "class='text-success'";
$style_no = "class='text-danger'";

function confirmsQuery($result) // This is check to make sure a query works
{ 
    global $connection; // Calls the variable from the db.php
    if(!$result) 
        {
            die("QUERY FAILED " . mysqli_error($connection));
        }


};

function select_role()
{
    global $connection;
    $query = "SELECT * FROM users_roles";
    $select_role_id = mysqli_query($connection, $query);
    confirmsQuery($select_role_id);
    
    while($row = mysqli_fetch_assoc($select_role_id)) 
    { 
        $role_id = $row['role_id'];
        $role_title = $row['role_title'];
        echo "<option value='$role_id'>{$role_title}</option>";
    }

}

function view_all_customers($query)
{ global $connection;
global $style_yes;
global $style_no;
    

                            while($row = mysqli_fetch_assoc($query)) 
                            {
                        
                            $customer_id = $row['customer_id'];
                            $brides_forename = $row['brides_forename'];
                            $brides_surname = $row['brides_surname'];
                            $grooms_forename = $row['grooms_forename'];
                            $grooms_surname = $row['grooms_surname'];
                            $preferred_contact = $row['preferred_contact'];
                            $wedding_booked = $row['wedding_booked'];

                            if($wedding_booked == 1) {
                                $wedding_booked = "Yes";
                                $style_wedding_booked = $style_yes . " class='align-middle'";
                            } else {
                                $wedding_booked = "No";
                                $style_wedding_booked = $style_no . " class='align-middle'";
                            }

                            $bride_and_groom = $brides_forename . " " . $brides_surname . " and " . $grooms_forename . " " . $grooms_surname . "<br>" . $preferred_contact;

                            echo "<tr>";
                            echo "<td class='align-middle'>$bride_and_groom </td>";
                            echo "<td $style_wedding_booked>$wedding_booked</td>";
                            echo "<td class='align-middle'><a class='btn btn-primary' role='button' href='customers.php?source=view_customer&view_customer={$customer_id}'><i class='fas fa-eye'></i> View</a>
                                <a class='btn btn-success' role='button' href='customers.php?source=edit_customer&edit_customer={$customer_id}'><i class='fas fa-user-edit'></i> Edit</a>
                                <a class='btn btn-danger' role='button' href='customers.php?delete={$customer_id}'><i class='fas fa-trash-alt'></i> Delete</a></td>";
                            echo "</tr>";
                            }
}

function view_all_users()
{ global $connection;

    echo "<div class='container-fluid'>";
    echo "<div class='row'>";

    $query = "SELECT * FROM wbs_users ORDER BY `user_username` ASC";
                            $select_customers = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_customers)) 
                            {
                            $user_id = $row['user_id'];
                            $user_username = $row['user_username'];
                            $user_password = $row['user_password'];
                            $user_role = $row['user_role'];
                            $user_randSalt = $row['user_randSalt'];

                            
                           
                            
                            // Looks up the user role Id and puts the Role Title there instead.
                            $query = "SELECT * FROM users_roles WHERE role_id = $user_role ";
                            $select_role_id = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_role_id)) 
                            { 
                            $role_id = $row['role_id'];
                            $role_title = $row['role_title'];}

                            // echo "<tr>";
                            // echo "<td>$user_id </td>";
                            // echo "<td>$user_username </td>";
                            // echo "<td>$user_password </td>";
                            // echo "<td>$role_title</td>";
                            // echo "<td>$user_randSalt</td>";
                            // echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>"; // Changes field data
                            // echo "<td><a href='users.php?change_to_owner={$user_id}'>Owner</a></td>"; // Changes field data
                            // echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>"; // Edit
                            // echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>"; // Delete
                            // echo "</tr>";
                            
                                if($role_id == 1){
                                    $user_style = "text-white bg-primary mb-3";
                                } elseif($role_id == 2) {
                                    $user_style = "text-white bg-secondary mb-3";
                                } else {
                                    $user_style = "text-white bg-warning mb-3";
                                }

                            echo "<div class='col-sm-4'>";
                            echo "<div class='card text-center $user_style'>";

                            
                                echo "<div class='card-header text-capitalize font-weight-bolder'>";
                                echo "<h3> $user_username </h3>";
                                echo "</div>";
                                
                                echo "<div class='card-body'>";
                                echo "<h5 class='card-title'>Role: $role_title</h5>";
                                echo "<a class='btn btn-dark mx-2' role='button' href='users.php?change_to_super={$user_id}'>Super</a>";
                                echo "<a class='btn btn-dark mx-2' role='button' href='users.php?change_to_admin={$user_id}'>Admin</a>";
                                echo "<a class='btn btn-dark mx-2' role='button' href='users.php?change_to_owner={$user_id}'>Owner</a>";
                                echo "</div>";
                                
                                echo "<div class='card-footer text-muted'>";
                                
                                echo "<a class='btn btn-dark mx-2' role='button' href='users.php?source=edit_user&edit_user={$user_id}'><i class='fas fa-user-edit'></i> Edit</a>";
                                echo "<a class='btn btn-dark mx-2' role='button' href='users.php?delete={$user_id}'><i class='fas fa-trash-alt'></i> Delete</a>";

                                echo "</div>";
                            
                            echo "</div>";
                            echo "</div>";

                            

                            
                            
                            }
                            echo "</div>";
                            echo "</div>";
                        


}


function view_all_weddings()
{ global $connection;
    global $style_yes;
global $style_no;
    $query = "SELECT * FROM event_details ORDER BY event_function_date ASC";

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
                            
                            $query = "SELECT * FROM customers_details WHERE customer_id = $event_customer_id";
                        
                            $select_customers = mysqli_query($connection, $query);
                        
                            while($row = mysqli_fetch_assoc($select_customers)) 
                            {
                        
                                $brides_forename = $row['brides_forename'];
                                $brides_surname = $row['brides_surname'];
                                $grooms_forename = $row['grooms_forename'];
                                $grooms_surname = $row['grooms_surname'];

                            }
                            
                            $bride_and_groom = $brides_forename . " " . $brides_surname . "<br>and<br> " . $grooms_forename . " " . $grooms_surname;
                        
                            



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
                                $event_had_final_talk = "No";
                                $style_had_final_talk = $style_no;
                            }

                            $event_function_date = date_format(new DateTime($event_function_date),"D d M Y");
                            $event_appointment_date = date_format(new DateTime($event_appointment_date),"D d M Y");
                            $event_hold_till_date = date_format(new DateTime($event_hold_till_date),"D d M Y");
                            $event_contract_issued_date = date_format(new DateTime($event_contract_issued_date),"D d M Y");
                            $event_deposit_taken_date = date_format(new DateTime($event_deposit_taken_date),"D d M Y");
                            $event_25_due_date = date_format(new DateTime($event_25_due_date),"D d M Y");
                            $event_final_wedding_talk_date = date_format(new DateTime($event_final_wedding_talk_date),"D d M Y");
                            $event_final_payment_date = date_format(new DateTime($event_final_payment_date),"D d M Y");

                            echo "<tr>";
                            echo "<td>$bride_and_groom<br>$event_function_date<br><br></td>";
                            echo "<td>Appointment: $event_appointment_date <br>Hold Till: $event_hold_till_date<br>Contract Issued: $event_contract_issued_date<br>Deposit Taken: $event_deposit_taken_date<br>25% Due: $event_25_due_date <br>Final Talk: $event_final_wedding_talk_date <br>Final Payment: $event_final_payment_date</td>";
                            echo "<td><br><span $style_hold>On Hold: $event_hold</span><br><span $style_agreement_signed>Signed: $event_agreement_signed</span><br><span $style_deposit_taken>Deposit Paid: $event_deposit_taken</span><br><span $style_25_paid>Paid: $event_25_paid</span><br><span $style_had_final_talk>Done: $event_had_final_talk</span></td>";
                     
                            echo "<td><br>Cost: £$event_cost <br> Deposit: £$event_deposit_amount <br> 25%: £$event_25_amount <br> Paid: £$event_paid <br> Left: £$event_total_outstanding </td>";
                            echo "<td><a class='btn btn-primary btn-block' role='button' href='customers.php?source=view_customer&view_customer={$event_customer_id}'><i class='fas fa-eye'></i> View Customer</a><br><a class='btn btn-block btn-success' role='button' href='weddings.php?source=edit_wedding&edit_wedding={$event_id}'><i class='fas fa-edit'></i> Edit</a><br><a class='btn btn-danger btn-block' role='button' href='weddings.php?delete={$event_id}&customer_id={$event_customer_id}'><i class='fas fa-trash-alt'></i> Delete</a></td>"; // Edit
                            echo "</tr>";
                            }
}



function uncompletedCustomers($minus) {
    global $connection;
                            echo " / ";
                            $query = "SELECT * FROM customers_details WHERE customer_event_complete = 0";
                            $select_all_customers = mysqli_query($connection,$query);
                            $total_customers = mysqli_num_rows($select_all_customers);
                            echo $total_customers - $minus;
}


// WEDDING RELATED FUNCTIONS

function create_appointment() {
    // Takes a couples customer id and updates the events table.
    global $connection;

        $event_customer_id = $_POST['event_customer_id'];
        $event_appointment_date = $_POST['event_appointment_date'];
        
        $event_hold_till_date = date_create($event_appointment_date);
        date_add($event_hold_till_date, date_interval_create_from_date_string("14 Days"));
        $event_hold_till_date = date_format($event_hold_till_date,"Y-m-d");
        $event_deposit_amount = 100.00;

        $query = "INSERT INTO event_details(event_customer_id, event_appointment_date, event_hold_till_date, event_hold, event_contract_returned, event_agreement_signed, event_deposit_taken, event_25_paid, event_had_final_talk, event_cost, event_25_amount, event_paid, event_total_outstanding, event_deposit_amount) ";
        $query .= "VALUES('{$event_customer_id}','{$event_appointment_date}','{$event_hold_till_date}', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '{$event_deposit_amount}') ";

        $create_wedding_query = mysqli_query($connection, $query);

        confirmsQuery($create_wedding_query); // Calls a function so that i can refer 

        $query = "UPDATE customers_details SET wedding_booked = 1 WHERE customer_id = $event_customer_id";
        $wedding_booked_Query = mysqli_query($connection, $query);
        confirmsQuery($wedding_booked_Query);

        header("Location: index.php"); // Refreshes Page
}

function create_quick_wedding() {
    global $connection;
        $event_customer_id = $_POST['event_customer_id'];
        $event_appointment_date = $_POST['event_appointment_date'];
        
        $event_hold_till_date = date_create($event_appointment_date);
        date_add($event_hold_till_date, date_interval_create_from_date_string("14 Days"));
        $event_hold_till_date = date_format($event_hold_till_date,"Y-m-d");
        $event_contract_returned = $_POST['event_contract_returned'];
        $event_agreement_signed = $_POST['event_agreement_signed'];
        $event_deposit_taken = $_POST['event_deposit_taken'];
        $event_25_paid = $_POST['event_25_paid'];
        
        $query = "INSERT INTO event_details(event_customer_id, event_appointment_date, event_hold_till_date, event_hold, event_contract_returned, event_agreement_signed, event_deposit_taken, event_25_paid, event_had_final_talk, event_cost, event_25_amount, event_paid, event_total_outstanding) ";
        $query .= "VALUES('{$event_customer_id}','{$event_appointment_date}','{$event_hold_till_date}', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0) ";

        $create_wedding_query = mysqli_query($connection, $query);

        confirmsQuery($create_wedding_query); // Calls a function so that i can refer 

        $query = "UPDATE customers_details SET wedding_booked = 1 WHERE customer_id = $event_customer_id";
        $wedding_booked_Query = mysqli_query($connection, $query);
        confirmsQuery($wedding_booked_Query);

        header("Location: weddings.php"); // Refreshes Page 
}

function updates_function_date($event_customer_id,$event_id) {
global $connection;

        $event_customer_id = $_POST['event_customer_id'];
        $event_function_date = $_POST['event_function_date'];   
        $event_contract_issued_date = $_POST['event_contract_issued_date'];

        $event_25_due_date = date_create($event_function_date);
        date_sub($event_25_due_date, date_interval_create_from_date_string("90 days"));
        $event_25_due_date = date_format($event_25_due_date,"Y-m-d");
        
        $event_final_wedding_talk_date = date_create($event_function_date);
        date_sub($event_final_wedding_talk_date, date_interval_create_from_date_string("42 days"));
        $event_final_wedding_talk_date = date_format($event_final_wedding_talk_date,"Y-m-d");
        
        $event_final_payment_date = date_create($event_function_date);
        date_sub($event_final_payment_date, date_interval_create_from_date_string("30 days"));
        $event_final_payment_date = date_format($event_final_payment_date,"Y-m-d");

        $query = "UPDATE event_details SET ";
        $query .= "event_function_date = '{$event_function_date}', ";
        $query .= "event_25_due_date = '{$event_25_due_date}', ";
        $query .= "event_final_wedding_talk_date = '{$event_final_wedding_talk_date}', ";
        $query .= "event_contract_issued_date = '{$event_contract_issued_date}', ";
        $query .= "event_final_payment_date = '{$event_final_payment_date}' ";
        $query .= "WHERE event_id = '{$event_id}' ";
        
        $update_event_function_date_query = mysqli_query($connection, $query);
        confirmsQuery($update_event_function_date_query);
        header("Location: index.php"); // Refreshes Page 


}

function updates_event_cost($event_id,$event_cost) {
    global $connection;

            $event_cost = $_POST['$event_cost'];
            
            $event_25_amount = $event_cost / 100 * 25;
    
            $query = "UPDATE event_details SET ";
            $query .= "event_cost = '{$event_cost}', ";
            $query .= "event_25_amount = '{$event_25_amount}', ";
            $query .= "event_total_outstanding = '{$event_cost}' ";
            $query .= "WHERE event_id = '{$event_id}' ";
            
            $update_event_cost_query = mysqli_query($connection, $query);
            confirmsQuery($update_event_cost_query);
            // header("Location: index.php"); // Refreshes Page 
    echo $event_cost;
    
    }

// ADDING RELATED FUNCTIONS

// Add Customers

function create_customer() {
    global $connection;
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
        $date_added = date('d-m-y');
        $wedding_booked = 0;

        $query = "INSERT INTO customers_details(brides_forename, brides_surname, brides_telephone, brides_email, grooms_forename, grooms_surname, grooms_telephone, grooms_email, preferred_contact, address_1, address_2, town_city, county, post_code, date_added, wedding_booked) ";
        $query .= "VALUES('{$brides_forename}','{$brides_surname}','{$brides_telephone}','{$brides_email}','{$grooms_forename}','{$grooms_surname}','{$grooms_telephone}','{$grooms_email}', '{$preferred_contact}', '{$address_1}','{$address_2}','{$town_city}','{$county}','{$post_code}',now(),$wedding_booked ) ";

        $create_customer_query = mysqli_query($connection, $query);

        confirmsQuery($create_customer_query); // Calls a function so that i can refer 
        header("Location: index.php"); // Refreshes Page 
}

// Add Wedding

function create_wedding() {
    global $connection;
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
    $event_cost = $_POST['event_cost'];
    $event_deposit_amount = 500.00;

    $event_25_amount = $event_cost / 100 * 25;
    
    $query = "INSERT INTO event_details(event_customer_id, event_appointment_date, event_hold_till_date, event_contract_issued_date, event_function_date, event_deposit_taken_date, event_25_due_date, event_final_wedding_talk_date, event_final_payment_date, event_hold, event_contract_returned, event_agreement_signed, event_deposit_taken, event_25_paid, event_had_final_talk, event_cost,event_deposit_amount,event_25_amount) ";
    $query .= "VALUES('{$event_customer_id}','{$event_appointment_date}','{$event_hold_till_date}','{$event_contract_issued_date}','{$event_function_date}','{$event_deposit_taken_date}','{$event_25_due_date}','{$event_final_wedding_talk_date}', '{$event_final_payment_date}', '{$event_hold}', '{$event_contract_returned}','{$event_agreement_signed}','{$event_deposit_taken}','{$event_25_paid}','{$event_had_final_talk}', '{$event_cost}','{$event_deposit_amount}','{$event_25_amount}') ";
    $create_wedding_query = mysqli_query($connection, $query);
    confirmsQuery($create_wedding_query); // Calls a function so that i can refer 

    $query = "UPDATE customers_details SET wedding_booked = 1 WHERE customer_id = $event_customer_id";
                            $wedding_booked_Query = mysqli_query($connection, $query);
                            confirmsQuery($wedding_booked_Query);
                            header("Location: index.php"); // Refreshes Page 

                        }


// EDITING RELATED FUNCTIONS

// Edit Users Profile

function edit_user($user_id) {
    global $connection;
    
        $user_username = $_POST['user_username'];
            $user_password = $_POST['user_password'];
            $user_role = $_POST['user_role'];
            $user_randSalt = $_POST['user_randSalt'];

            $query = "UPDATE wbs_users SET ";
            $query .= "user_username = '{$user_username}', ";
            $query .= "user_password = '{$user_password}', ";
            $query .= "user_role = '{$user_role}', ";
            $query .= "user_randSalt = '{$user_randSalt}' ";
            $query .= "WHERE user_id = {$user_id} ";

    $update_user_query = mysqli_query($connection, $query);

    confirmsQuery($update_user_query); // Calls a function so that i can refer
    header("Location: users.php"); // Refreshes Page 
}

