
<table class = "table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Customer Id</th>
                                        <th>Appointment Date</th>
                                        <th>Hold Till Date</th>
                                        <th>Contract Issued Date</th>
                                        <th>Function Date</th>
                                        <th>Deposit Taken Date</th>
                                        <th>25% Payment Due Date</th>
                                        <th>Final Wedding Talk Date</th> 
                                        <th>Final Payment Date</th>
                                        <th>Hold</th>
                                        <th>Contract Returned</th>
                                        <th>Agreement Signed</th>
                                        <th>Deposit Taken</th>
                                        <th>25% Payment Paid</th>
                                        <th>Had Final Talk</th>
                                        <th>Sub Total</th>
                                        <th>25% Amount</th>
                                        <th>Amount Paid</th>
                                        <th>Outstanding</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>


                            <?php 
                            
                            view_all_weddings();
                            
                            ?>
                                </tbody>
                            </table>

                            <?php 
                                
                            
                            if(isset($_GET['delete'])) {
        
                                $delete_event_id = $_GET['delete'];
                                $query = "DELETE FROM event_details WHERE event_id = {$delete_event_id}";
                                $deleteQuery = mysqli_query($connection, $query);
                                header("Location: weddings.php"); // Refreshes Page
                            }
                            
                            
                            
                            ?>


