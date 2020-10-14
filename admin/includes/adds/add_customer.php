<div class="jumbotron jumbotron-fluid mt-2 p-2">
            <div class="container">
                <h1 class="display-4">Adding Customer</h1>
            </div>
        </div>

<?php

    if(isset($_POST['create_customer'])) 
    {
        create_customer();
    }


?>

<div class="container">

<?php include "includes/forms/formaddcustomer.php" ?>
</div>