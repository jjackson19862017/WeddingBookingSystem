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

            while($row = mysqli_fetch_assoc($searchQuery)) 
                {
                    $customer_id = $row['customer_id'];
                    $brides_forename = $row['brides_forename'];
                    $brides_surname = $row['brides_surname'];
                    $brides_telephone = $row['brides_telephone'];
                    $brides_email = $row['brides_email'];
                    $grooms_forename = $row['grooms_forename'];
                    $grooms_surname = $row['grooms_surname'];
                    $grooms_telephone = $row['grooms_telephone'];
                    $grooms_email = $row['grooms_email'];
                    $preferred_contact = $row['preferred_contact'];
                    $address_1 = $row['address_1'];
                    $address_2 = $row['address_2'];
                    $town_city = $row['town_city'];
                    $county = $row['county'];
                    $post_code = $row['post_code'];
                    $date_added = $row['date_added'];

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

                <table class = "table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Brides Forename</th>
                                        <th>Brides Surname</th>
                                        <th>Brides Tele</th>
                                        <th>Brides Email</th>
                                        <th>Grooms Forename</th>
                                        <th>Grooms Surname</th>
                                        <th>Grooms Tele</th>
                                        <th>Grooms Email</th> 
                                        <th>Preferred Contact</th>
                                        <th>Address 1</th>
                                        <th>Address 2</th>
                                        <th>Town or City</th>
                                        <th>County</th>
                                        <th>Post Code</th>
                                        <th>Date Added</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>


                            <?php 
                            
                            echo "<tr>";
                            echo "<td>$customer_id </td>"; 
                            echo "<td>$brides_forename </td>";
                            echo "<td>$brides_surname </td>";
                            echo "<td>$brides_telephone</td>";
                            echo "<td>$brides_email</td>";
                            echo "<td>$grooms_forename </td>";
                            echo "<td>$grooms_surname </td>";
                            echo "<td>$grooms_telephone</td>";
                            echo "<td>$grooms_email</td>";
                            echo "<td>$preferred_contact</td>";
                            echo "<td>$address_1</td>";
                            echo "<td>$address_2</td>";
                            echo "<td>$town_city</td>";
                            echo "<td>$county</td>";
                            echo "<td>$post_code</td>";
                            echo "<td>$date_added</td>";

                            echo "<td><a href='customer_details.php?source=edit_customer&edit_customer={$customer_id}'>Edit</a></td>"; // Edit
                            echo "<td><a href='customer_details.php?delete={$customer_id}'>Delete</a></td>"; // Delete
                            echo "</tr>";
                            
                            ?>
                                </tbody>
                            </table>

                            <?php 
                                
                            
                            if(isset($_GET['delete'])) {
        
                                $delete_customer_id = $_GET['delete'];
                                $query = "DELETE FROM customers_details WHERE customer_id = {$delete_customer_id}";
                                $deleteQuery = mysqli_query($connection, $query);
                                header("Location: customer_details.php"); // Refreshes Page
                            }
                            
                            
                            
                            ?>
        <?php } 
            }
} else {
    $search = "No Search Performed.";
}?>
            </div>
        </div>
    
<!-- /.container-fluid -->



<?php include "includes/admin_footer.php" ?>


</body>

</html>
