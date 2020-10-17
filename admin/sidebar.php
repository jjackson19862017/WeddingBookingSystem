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
<!-- First Box on the  Sidebar / Index Page -->
<div class="well">
    <?php include "includes/forms/formcreatequickappointment.php" ?>
</div>

<!-- Second Box on the  Sidebar / Index Page -->
<div class="well">
    <?php include "includes/forms/formcreatequickwedding.php" ?>
</div>

<!-- Third Box on the  Sidebar / Index Page -->
<div class="well">
    <?php include "includes/forms/formcreatequickcost.php" ?>
</div>