<?php include "includes/admin_header.php" ?>

<body>

    

        <!-- Navigation -->
    <?php include "includes/admin_navigation.php" ?>
        

        

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            View All Weddings
                        </h1>
                            
                            <?php 
                            
                            if(isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = '';
                            }
                                switch($source ) {

                                    case 'add_wedding';
                                    include "includes/add_wedding.php";
                                    break;

                                    case 'edit_wedding';
                                    include "includes/edit_wedding.php";
                                    break;

                                    default:
                                    include "includes/view_all_weddings.php";
                                    break;


                                }


                            
                            ?>
                        


    <?php include "includes/admin_footer.php" ?>


</body>

</html>
