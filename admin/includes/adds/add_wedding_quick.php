<div class="jumbotron jumbotron-fluid mt-2 p-2">
            <div class="container">
                <h1 class="display-4">Add Quick Wedding</h1>
            </div>
        </div>

<?php

    if(isset($_POST['create_wedding'])) 
    {    
        create_quick_wedding();
    }


?>

<div class="col-xs-12 col-md-12">
<?php include "includes/forms/formcreatequickwedding.php" ?>
</div>