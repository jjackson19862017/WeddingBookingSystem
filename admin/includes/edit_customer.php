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
        header("Location: customer_details.php"); // Refreshes Page 
        
    }


?>

<div class="col-xs-12 col-md-12">

<form class="well" action="" method="post">

<div class="form-group">
        <label for="brides_forename">Brides Forename</label>
        <input type="text" name="brides_forename" id="" class="form-control" value="<?php echo $brides_forename?>">
    </div>

    <div class="form-group">
        <label for="brides_surname">Brides Surname</label>
        <input type="text" name="brides_surname" id="" class="form-control" value="<?php echo $brides_surname?>">
    </div>

    <div class="form-group">
        <label for="brides_telephone">Brides Telephone</label>
        <input type="text" name="brides_telephone" id="" class="form-control" value="<?php echo $brides_telephone?>">
    </div>

    <div class="form-group">
        <label for="brides_email">Brides Email</label>
        <input type="email" name="brides_email" id="" class="form-control" value="<?php echo $brides_email?>">
    </div>

    <div class="form-group">
        <label for="grooms_forename">Grooms Forename</label>
        <input type="text" name="grooms_forename" id="" class="form-control"value="<?php echo $grooms_forename?>">
    </div>

    <div class="form-group">
        <label for="grooms_surname">Grooms Surname</label>
        <input type="text" name="grooms_surname" id="" class="form-control" value="<?php echo $grooms_surname?>">
    </div>

    <div class="form-group">
        <label for="grooms_telephone">Grooms Telephone</label>
        <input type="text" name="grooms_telephone" id="" class="form-control" value="<?php echo $grooms_telephone?>">
    </div>

    <div class="form-group">
        <label for="grooms_email">Grooms Email</label>
        <input type="email" name="grooms_email" id="" class="form-control" value="<?php echo $grooms_email?>">
    </div>

    <div class="form-group">
        <label for="preferred_contact">Preferred Contact</label>
        <input type="text" name="preferred_contact" id="" class="form-control" value="<?php echo $preferred_contact?>">
    </div>

    <div class="form-group">
        <label for="address_1">Address 1</label>
        <input type="text" name="address_1" id="" class="form-control" value="<?php echo $address_1?>">
    </div>

    <div class="form-group">
        <label for="address_2">Address 2</label>
        <input type="text" name="address_2" id="" class="form-control" value="<?php echo $address_2?>">
    </div>

    <div class="form-group">
        <label for="town_city">Town / City</label>
        <input type="text" name="town_city" id="" class="form-control" value="<?php echo $town_city?>">
    </div>

    <div class="form-group">
        <label for="county">County</label>
        <input type="text" name="county" id="" class="form-control" value="<?php echo $county?>">
    </div>

    <div class="form-group">
        <label for="post_code">Post Code</label>
        <input type="text" name="post_code" id="" class="form-control" value="<?php echo $post_code?>">
    </div>

    <div class="form-group">
        <label for="wedding_booked">Wedding Booked?<br></label>
        <div class="form-check form-check-inline">
            <?php    
            if($wedding_booked == 1){
            echo '<input class="form-check-input" type="radio" name="wedding_booked" id="inlineRadio1" value="1" checked>';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="wedding_booked" id="inlineRadio2" value="0">';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; 
            } else {
            echo '<input class="form-check-input" type="radio" name="wedding_booked" id="inlineRadio1" value="1">';
            echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
            echo '<input class="form-check-input" type="radio" name="wedding_booked" id="inlineRadio2" value="0" checked>';
            echo '<label class="form-check-label" for="inlineRadio2">No</label>'; }
                ?>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_customer" id="" Value="Edit Customers Details">
    </div>

</form>
</div>