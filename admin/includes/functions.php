<?php

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


function insert_navi() 
{
    global $connection; // Calls the variable from the db.php
    if(isset($_POST['submit'])) // If the submit button was pressed on the navi form.
        {
        // echo "<h1>Hello</h1>";    //  TESTING
            $navi_name = $_POST['navi_name'];

            if($navi_name == "" || empty($navi_name)) 
                {
                    echo "This field should not be empty.";
                } 
                else 
                {
                    
                    $query = "INSERT INTO admin_navi(navi_name) ";
                    $query .= "VALUE('{$navi_name}') ";
                    $create_navi = mysqli_query($connection, $query);
                    if(!$create_navi) 
                    {
                    die('QUERY FAILED' . mysqli_error($connection));
                    }


                }
        } 

}

function findAllnavi() 
{
global $connection;

$query = "SELECT * FROM admin_navi";
$select_navi = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_navi)) 
        {
        $navi_id = $row['navi_id'];
        $navi_name = $row['navi_name'];
        $navi_icon = htmlspecialchars($row['navi_icon'],ENT_QUOTES);

        echo "<tr>";
        echo "<td>{$navi_id}</td>";
        echo "<td>{$navi_name}</td>";
        echo "<td>{$navi_icon}</td>";
        echo "<td><a href='navi.php?delete={$navi_id}'>Delete</a></td>"; // Delete
        echo "<td><a href='navi.php?edit={$navi_id}'>Edit</a></td>"; // Edit
        echo "<tr>";
        }
}

function delete_navi() 
{
global $connection;
    
    if(isset($_GET['delete'])) 
    {
        $delete_navi_id = $_GET['delete'];
        $query = "DELETE FROM admin_navi WHERE navi_id = {$delete_navi_id}";
        $deleteQuery = mysqli_query($connection, $query);
        header("Location: navi.php"); // Refreshes Page
    }




}

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

function view_all_customers()
{ global $connection;
global $style_yes;
global $style_no;
    $query = "SELECT * FROM customers_details";

                            $selectusers = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($selectusers)) 
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
                     
                            echo "<td><br>Cost: £$event_cost <br> 25%: £$event_25_amount <br> Paid: £$event_paid <br> Left: £$event_total_outstanding </td>";
                            echo "<td><a class='btn btn-primary btn-block' role='button' href='customers.php?source=view_customer&view_customer={$event_customer_id}'><i class='fas fa-eye'></i> View Customer</a><br><a class='btn btn-block btn-success' role='button' href='weddings.php?source=edit_wedding&edit_wedding={$event_id}'><i class='fas fa-edit'></i> Edit</a><br><a class='btn btn-danger btn-block' role='button' href='weddings.php?delete={$event_id}&customer_id={$event_customer_id}'><i class='fas fa-trash-alt'></i> Delete</a></td>"; // Edit
                            echo "</tr>";
                            }
}






?>