<?php

    if(isset($_POST['create_appointment'])) 
    {
        create_appointment(); // Inserts an appointment.
    }

    if(isset($_POST['add_function_date'])) 
    {
        updates_function_date($event_customer_id,$event_id);    
    }

   

?>

<div class="well">
    <?php include "includes/forms/formcreatequickappointment.php" ?>
</div>

<div class="well">
    <?php include "includes/forms/formcreatequickwedding.php" ?>
</div>

<div class="well">
    <?php include "includes/forms/formcreatequickcost.php" ?>
</div>