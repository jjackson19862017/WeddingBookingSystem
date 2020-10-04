<?php

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

                            echo "<tr>";
                            echo "<td>$customer_id </td>";
                            
                            echo "<td>$brides_forename </td>";
                            echo "<td>$brides_surname </td>";
                            echo "<td>$brides_telephone</td>";
                            echo "<td>$brides_email</td>";
                            echo "<td>$grooms_forename </td>";
                            echo "<td>$grooms_surname </td>";
                            echo "<td>$grooms_telephone</td>";
                            echo "<td>$grooms_email</td>";
                            echo "<td>$preferred_contact</td>";
                            echo "<td>$address_1</td>";
                            echo "<td>$address_2</td>";
                            echo "<td>$town_city</td>";
                            echo "<td>$county</td>";
                            echo "<td>$post_code</td>";
                            echo "<td>$date_added</td>";

                            echo "<td><a href='customer_details.php?source=edit_customer&edit_customer={$customer_id}'>Edit</a></td>"; // Edit
                            echo "<td><a href='customer_details.php?delete={$customer_id}'>Delete</a></td>"; // Delete
                            echo "</tr>";
                            }
}

function view_all_users()
{ global $connection;
    $query = "SELECT * FROM wbs_users";
                            $select_customers = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_customers)) 
                            {
                            $user_id = $row['user_id'];
                            $user_username = $row['user_username'];
                            $user_password = $row['user_password'];
                            $user_role = $row['user_role'];
                            $user_randSalt = $row['user_randSalt'];

                            echo "<tr>";
                            echo "<td>$user_id </td>";
                            
                            echo "<td>$user_username </td>";
                            echo "<td>$user_password </td>";

                            $query = "SELECT * FROM users_roles WHERE role_id = $user_role ";
                            $select_role_id = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_role_id)) 
                            { 
                            $role_id = $row['role_id'];
                            $role_title = $row['role_title'];}

                            echo "<td>$role_title</td>";
                            echo "<td>$user_randSalt</td>";
                            echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>"; // Changes field data
                            echo "<td><a href='users.php?change_to_owner={$user_id}'>Owner</a></td>"; // Changes field data
                            echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>"; // Edit
                            echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>"; // Delete
                            echo "</tr>";
                            }
}


function view_all_weddings()
{ global $connection;
    $query = "SELECT * FROM event_details";

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
                            $event_subtotal = $row['event_subtotal'];
                            $event_25_amount = $row['event_25_amount'];
                            $event_paid = $row['event_paid'];
                            $event_total_outstanding = $row['event_total_outstanding'];
                            


                            echo "<tr>";
                            echo "<td>$event_id </td>";
                            echo "<td>$event_customer_id </td>";
                            echo "<td>$event_appointment_date </td>";
                            echo "<td>$event_hold_till_date</td>";
                            echo "<td>$event_contract_issued_date</td>";
                            echo "<td>$event_function_date </td>";
                            echo "<td>$event_deposit_taken_date </td>";
                            echo "<td>$event_25_due_date</td>";
                            echo "<td>$event_final_wedding_talk_date</td>";
                            echo "<td>$event_final_payment_date</td>";
                            echo "<td>$event_hold</td>";
                            echo "<td>$event_contract_returned</td>";
                            echo "<td>$event_agreement_signed</td>";
                            echo "<td>$event_deposit_taken</td>";
                            echo "<td>$event_25_paid</td>";
                            echo "<td>$event_had_final_talk</td>";
                            echo "<td>$event_subtotal</td>";
                            echo "<td>$event_25_amount</td>";
                            echo "<td>$event_paid</td>";
                            echo "<td>$event_total_outstanding</td>";


                            echo "<td><a href='wedding_details.php?source=edit_wedding&edit_wedding={$event_id}'>Edit</a></td>"; // Edit
                            echo "<td><a href='wedding_details.php?delete={$event_id}'>Delete</a></td>"; // Delete
                            echo "</tr>";
                            }
}






?>