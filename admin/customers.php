<?php include "includes/admin_header.php" ?>

<body>
        <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>
                            
    <?php 
    
    if(isset($_GET['source'])) {
        $source = $_GET['source'];
    } else {
        $source = '';
    }
        switch($source ) {

            case 'add_customer';
            include "includes/adds/add_customer.php";
            break;

            case 'edit_customer';
            include "includes/edits/edit_customer.php";
            break;

            case 'view_customer';
            include "includes/views/view_customer.php";
            break;

            default:
            include "includes/views/view_all_customers.php";
            break;
        }                        
    ?>

    <?php include "includes/admin_footer.php" ?>
</body>

</html>
