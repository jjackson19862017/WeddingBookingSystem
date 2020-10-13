
<?php 
$query = "SELECT * FROM event_details WHERE event_hold = 1";
$select_all_hold_events = mysqli_query($connection,$query);
$total_wedding_events_on_hold = mysqli_num_rows($select_all_hold_events);
?>


<div class="jumbotron jumbotron-fluid mt-2 p-2">
    <div class="container">
        <h1 class="display-4"><?php if($total_wedding_events_on_hold === 0) 
        {echo "NO WEDDINGS BOOKED";}
        elseif($total_wedding_events_on_hold === 1)
        {echo "You have 1 wedding booked";}
        else {echo "You have " . $total_wedding_events_on_hold . " weddings booked";} ?> </h1>
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-3">
        <button type="button" class="btn btn-secondary btn-block">Secondary</button>
        </div>
        <div class="col-xs-6 col-md-3">
        <button type="button" class="btn btn-secondary btn-block">Secondary</button>
        </div>
        <div class="col-xs-6 col-md-3">
        <button type="button" class="btn btn-secondary btn-block">Secondary</button>
        </div>
        <div class="col-xs-6 col-md-3">
        <button type="button" class="btn btn-secondary btn-block">Secondary</button>
        </div>
    </div>
</div>



<table class = "table table-bordered table-hover text-center">
    <caption>A table showing all the weddings booked</caption>
    <thead class="thead-dark">
                                    <tr>
                                        <th class="align-middle">Customer Info</th>
                                        <th class="align-middle" style="width: 350px;">Dates</th>
                                        <th class="align-middle" style="width: 200px;">Status</th>
                                        <th class="align-middle" style="width: 250px;">Finances</th>
                                        <th class="align-middle">Operations</th>
                                        
                                        
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
                                $customer_id = $_GET['customer_id'];
                                $query = "DELETE FROM event_details WHERE event_id = {$delete_event_id}";
                                $deleteQuery = mysqli_query($connection, $query);
                                $query = "UPDATE customers_details SET wedding_booked = 0 WHERE customer_id = {$customer_id}";
                                $unbook_event = mysqli_query($connection, $query);
                                confirmsQuery($unbook_event);
                                header("Location: weddings.php"); // Refreshes Page
                            }
                            
                            
                            
                            ?>


