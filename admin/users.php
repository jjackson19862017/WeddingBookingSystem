<?php include "includes/admin_header.php" ?>

<body>
        <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>

    <div class="jumbotron jumbotron-fluid mt-2 p-2">
        <div class="container">
            <h1 class="display-4">Viewing All Users</h1>
            <p class="lead">You can change the roles of the users by clicking on the Roles Button.  You can also Edit and Delete Users.</p>
        </div>
    </div>
                            
    <?php 
    
    if(isset($_GET['source'])) 
    {
        $source = $_GET['source'];
    } else {
        $source = '';
    }
        switch($source ) {

            case 'add_user';
            include "includes/adds/add_user.php";
            break;

            case 'edit_user';
            include "includes/edits/edit_user.php";
            break;

            default:
            include "includes/views/view_all_users.php";
            break;
        }

    ?>
                        
    <?php include "includes/admin_footer.php" ?>

</body>

</html>
