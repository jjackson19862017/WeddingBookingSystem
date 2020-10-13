<?php include "includes/admin_header.php" ?>
<body>
<!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>
<?php
        if(isset($_POST['submit'])) 
{

    $search = $_POST['search'];

    // If submitted search database using the following fields to look for a name and return the results.

    $query = "SELECT * FROM customers_details WHERE brides_forename LIKE '%$search%' OR brides_surname LIKE '%$search%' OR grooms_forename LIKE '%$search%' OR grooms_surname LIKE '%$search%' ";
    $searchQuery = mysqli_query($connection, $query);

    if(!$searchQuery) // If Query fails.
    {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $count = mysqli_num_rows($searchQuery); // Counts the returned query
 
    if($count == 0 ) 
    { ?>
    <div class="jumbotron jumbotron-fluid mt-2 p-2">
        <div class="container">
            <h1 class="display-4"><?php echo "No Results for " . $search ;?></h1>
            <p class="lead">Sorry please try a different criteria.</p>
        </div>
    </div>
                
    <?php } else {

            ?>
            <div class="jumbotron jumbotron-fluid mt-2 p-2">
                        <div class="container">
                        <?php 
                            if($count > 1){
                            $count_result = "Found " . $count . " Results for " . $search;}
                            else {
                            $count_result = "Found " . $count . " Result for " . $search;
                            }
                        ?>
                            <h1 class="display-4"><?php echo $count_result ;?></h1>
                        </div>
                    </div>
                    <?php include "includes/tables/tabletopcustomer.php" ?>
            <?php
            view_all_customers($searchQuery);
            }?>
                                <?php include "includes/tables/tablebottomcustomer.php" ?>
<?php                            
} else {
    $search = "No Search Performed.";
}?>
            </div>
        </div>
    </div>
    
<!-- /.container-fluid -->



<?php include "includes/admin_footer.php" ?>


</body>

</html>
