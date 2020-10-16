<form action="" method="post">
            <?php 
             // Counts all the Rows where Function Date is Null
             $query = "SELECT * FROM event_details WHERE event_function_date IS NOT NULL AND event_cost = 0";
             $select_all_not_null_function_dates = mysqli_query($connection,$query);
             $total_not_null_function_dates = mysqli_num_rows($select_all_not_null_function_dates);
             

            if($total_not_null_function_dates == 0){
                        echo "<h5 class='text-center'>All Costs Have Been Inserted.</h5>"; 
                        } else { 
            ?>
        <div class="form-row">    
            <div class="form-group col-md-3">
                    <label for="event_customer_id">Couple:</label>
            </div>
            <div class="col-md-9">
                <select name="event_customer_id" id="">
                    <?php 
                        $query = "SELECT * FROM event_details WHERE event_function_date IS NOT NULL";
                        $total_not_null_function_dates = mysqli_query($connection, $query);
                        confirmsQuery($total_not_null_function_dates);
                        while($row = mysqli_fetch_assoc($total_not_null_function_dates)) 
                        {
                        $event_id = $row['event_id'];
                        $event_customer_id = $row['event_customer_id'];
                        $event_cost = $row['event_cost'];
                        }
                        
                        $query= "SELECT * FROM customers_details WHERE customer_id = $event_customer_id";
                        $select_all_null_event_date = mysqli_query($connection, $query);
                        confirmsQuery($select_all_null_event_date);
                        while($row = mysqli_fetch_assoc($select_all_null_event_date)){
                        $brides_forename = $row['brides_forename'];
                        $brides_surname = $row['brides_surname'];
                        $grooms_forename = $row['grooms_forename'];
                        $grooms_surname = $row['grooms_surname'];
                        }

                        // $query = "SELECT * FROM transactions WHERE trans_event_id = $event_id";
                        // $select_event_transactions = mysqli_query($connection, $query);
                        // confirmsQuery($select_event_transactions);
                        // while($row = mysqli_fetch_assoc($select_event_transactions)){
                        //     $trans_event_id = $row['trans_event_id'];
                        //     $trans_date = $row['trans_date'];
                        //     $trans_detail = $row['trans_detail'];
                        //     $trans_amount = $row['trans_amount'];
                        //     }
                    

                    

                        $couple = $brides_forename . " " . $brides_surname . " & " . $grooms_forename . " " . $grooms_surname ;
                        echo "<option value='$event_customer_id'>{$couple}</option>";
                        
                        if(isset($_POST['add_cost'])) 
                        {
                            
                            $event_cost = $_POST['event_cost'];
                            $event_25_amount = $event_cost / 100 * 25;
                    
                            $query = "UPDATE event_details SET ";
                            $query .= "event_cost = '{$event_cost}', ";
                            $query .= "event_25_amount = '{$event_25_amount}', ";
                            $query .= "event_total_outstanding = '{$event_cost}' ";
                            $query .= "WHERE event_id = '{$event_id}' ";
                            
                            $update_event_cost_query = mysqli_query($connection, $query);
                            confirmsQuery($update_event_cost_query);
                             header("Location: index.php"); // Refreshes Page     
                        }



                    ?>
                </select>
            </div>
        </div>
        <!-- /Form-row -->
        <div class="form-row">
            <div class="form-group col-md-7">
                <label class="align-middle" for="event_cost">Set Event Cost: </label>
            </div>
            <div class="col-md-5">
                <input type="number" name="event_cost" id="" class="form-control">
            </div>
        </div>
        
        <!-- /Form-row -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" name="add_cost" id="" Value="Insert Event Cost">
        </div>
                <?php } ?>
        </form>
       