<div class="jumbotron jumbotron-fluid mt-2 p-2">
            <div class="container">
                <h1 class="display-4">View All Customers</h1>
            </div>
        </div>
<div class="container">
<table class = "table table-bordered table-hover text-center">
<caption>List of all the customers.</caption>
                                <thead class="thead-dark">
                                    <tr>
                                        
                                        <th class="align-middle" style="width: 400px;">Bride and Groom</th>
                                        <th class="align-middle" style="width: 100px;">Wedding Booked</th>
                                        <th class="align-middle" style="width: 300px;">Operations</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>


                            <?php 
                            
                            view_all_customers();
                            
                            ?>
                                </tbody>
                            </table>

                            <?php 
                                
                            
                            if(isset($_GET['delete'])) {
        
                                $delete_customer_id = $_GET['delete'];
                                $query = "DELETE FROM customers_details WHERE customer_id = {$delete_customer_id}";
                                $deleteQuery = mysqli_query($connection, $query);
                                header("Location: customers.php"); // Refreshes Page
                            }
                            
                            
                            
                            ?>


</div>