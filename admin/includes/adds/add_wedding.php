<div class="jumbotron jumbotron-fluid mt-2 p-2">
            <div class="container">
                <h1 class="display-4">Add Wedding</h1>
            </div>
        </div>

<?php

    if(isset($_POST['create_wedding'])) 
    {
       create_wedding();
    }
?>

<div class="container">
<?php include "includes/forms/formaddwedding.php" ?>
</div>