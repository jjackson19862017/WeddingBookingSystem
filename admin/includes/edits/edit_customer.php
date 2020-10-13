<div class="jumbotron jumbotron-fluid mt-2 p-2">
            <div class="container">
                <h1 class="display-4">Editing Customer</h1>
            </div>
        </div>

<?php

if(isset($_GET['edit_customer'])) {
    $the_customer_id = $_GET['edit_customer'];
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
        header("Location: customers.php"); // Refreshes Page 
        
    }


?>

<div class="container">

<?php include "includes/forms/formeditcustomer.php" ?>

</div>