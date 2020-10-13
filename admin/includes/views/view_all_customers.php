<div class="jumbotron jumbotron-fluid mt-2 p-2">
            <div class="container">
                <h1 class="display-4">View All Customers</h1>
            </div>
        </div>
<?php include "includes/tables/tabletopcustomer.php" ?>

<?php 
$query = "SELECT * FROM customers_details";
$selectusers = mysqli_query($connection, $query);
view_all_customers($selectusers);
?>
<?php include "includes/tables/tablebottomcustomer.php" ?>

</div>