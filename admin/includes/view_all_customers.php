
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
                            
                            view_all_customers();
                            
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


