<?php

    if(isset($_POST['create_customer'])) 
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
        $date_added = date('d-m-y');

        $query = "INSERT INTO customers_details(brides_forename, brides_surname, brides_telephone, brides_email, grooms_forename, grooms_surname, grooms_telephone, grooms_email, preferred_contact, address_1, address_2, town_city, county, post_code, date_added) ";
        $query .= "VALUES('{$brides_forename}','{$brides_surname}','{$brides_telephone}','{$brides_email}','{$grooms_forename}','{$grooms_surname}','{$grooms_telephone}','{$grooms_email}', '{$preferred_contact}', '{$address_1}','{$address_2}','{$town_city}','{$county}','{$post_code}',now() ) ";

        $create_customer_query = mysqli_query($connection, $query);

        confirmsQuery($create_customer_query); // Calls a function so that i can refer 
    }


?>

<div class="col-xs-12 col-md-6">

<form class="well" action="" method="post">

    <div class="form-group">
        <label for="brides_forename">Brides Forename</label>
        <input type="text" name="brides_forename" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="brides_surname">Brides Surname</label>
        <input type="text" name="brides_surname" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="brides_telephone">Brides Telephone</label>
        <input type="text" name="brides_telephone" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="brides_email">Brides Email</label>
        <input type="email" name="brides_email" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="grooms_forename">Grooms Forename</label>
        <input type="text" name="grooms_forename" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="grooms_surname">Grooms Surname</label>
        <input type="text" name="grooms_surname" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="grooms_telephone">Grooms Telephone</label>
        <input type="text" name="grooms_telephone" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="grooms_email">Grooms Email</label>
        <input type="email" name="grooms_email" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="preferred_contact">Preferred Contact</label>
        <input type="text" name="preferred_contact" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="address_1">Address 1</label>
        <input type="text" name="address_1" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="address_2">Address 2</label>
        <input type="text" name="address_2" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="town_city">Town / City</label>
        <input type="text" name="town_city" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="county">County</label>
        <input type="text" name="county" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_code">Post Code</label>
        <input type="text" name="post_code" id="" class="form-control">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_customer" id="" Value="Add Customer">
    </div>

</form>
</div>