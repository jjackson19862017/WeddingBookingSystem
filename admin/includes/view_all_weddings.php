
<table class = "table table-bordered table-hover text-center">
    <caption>A table showing all the weddings booked</caption>
                                <thead>
                                    <tr>
                                        <th class="align-middle">Id</th>
                                        <th class="align-middle">Customer Id</th>
                                        <th class="align-middle">Appointment Date</th>
                                        <th class="align-middle">Hold Till Date</th>
                                        <th class="align-middle">Contract Issued Date</th>
                                        <th class="align-middle">Wedding Date</th>
                                        <th class="align-middle">Deposit Taken Date</th>
                                        <th class="align-middle">25% Payment Due Date</th>
                                        <th class="align-middle">Final Wedding Talk Date</th> 
                                        <th class="align-middle">Final Payment Date</th>
                                        <th class="align-middle">Hold</th>
                                        <th class="align-middle">Contract Returned</th>
                                        <th class="align-middle">Agreement Signed</th>
                                        <th class="align-middle">Deposit Taken</th>
                                        <th class="align-middle">25% Payment Paid</th>
                                        <th class="align-middle">Had Final Talk</th>
                                        <th class="align-middle">Sub Total</th>
                                        <th class="align-middle">25% Amount</th>
                                        <th class="align-middle">Amount Paid</th>
                                        <th class="align-middle">Outstanding</th>
                                        <th class="align-middle">Edit</th>
                                        <th class="align-middle">Delete</th>
                                        
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


