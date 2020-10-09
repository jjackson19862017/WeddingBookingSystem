<?php include "includes/admin_header.php" ?>

<body>

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>
        

    <div class="jumbotron jumbotron-fluid mt-2 p-2">
            <div class="container">
                <h1 class="display-4">View All Customers</h1>
            </div>
        </div>
                            
                            <?php 
                            
                            if(isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = '';
                            }
                                switch($source ) {

                                    case 'add_customer';
                                    include "includes/add_customer.php";
                                    break;

                                    case 'edit_customer';
                                    include "includes/edit_customer.php";
                                    break;

                                    default:
                                    include "includes/view_all_customers.php";
                                    break;


                                }


                            
                            ?>
                        


    <?php include "includes/admin_footer.php" ?>


</body>

</html>
