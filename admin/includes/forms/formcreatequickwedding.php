<form action="" method="post">
            <?php 
             // Counts all the Rows where Function Date is Null
             $query = "SELECT * FROM event_details WHERE event_function_date IS NULL";
             $select_all_null_function_dates = mysqli_query($connection,$query);
             $total_null_function_dates = mysqli_num_rows($select_all_null_function_dates);
             

            if($total_null_function_dates == 0){
                        echo "<h5 class='text-center'>All Weddings have been booked.</h5>"; 
                        } else { 
            ?>
        <div class="form-row">    
            <div class="form-group col-md-3">
                    <label for="event_customer_id">Couple:</label>
            </div>
            <div class="col-md-9">
                <select name="event_customer_id" id="">
                    <?php 
                        $query = "SELECT * FROM event_details WHERE event_function_date IS NULL";
                        $select_null_event_date = mysqli_query($connection, $query);
                        confirmsQuery($select_null_event_date);
                        while($row = mysqli_fetch_assoc($select_null_event_date)) 
                        {
                        $event_id = $row['event_id'];
                        $event_customer_id = $row['event_customer_id'];
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

                    

                        $couple = $brides_forename . " " . $brides_surname . " & " . $grooms_forename . " " . $grooms_surname ;
                        echo "<option value='$event_customer_id'>{$couple}</option>";
                        
                    ?>
                </select>
            </div>
        </div>
        <!-- /Form-row -->
        <div class="form-row">
            <div class="form-group col-md-7">
                <label class="align-middle" for="event_function_date">Set Wedding Date: </label>
            </div>
            <div class="col-md-5">
                <input type="date" name="event_function_date" id="" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-7">
                <label class="align-middle" for="event_contract_issued_date">Contract Issued Date: </label>
            </div>
            <div class="col-md-5">
                <input type="date" name="event_contract_issued_date" id="" class="form-control">
            </div>
        </div>
        <!-- /Form-row -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" name="add_function_date" id="" Value="Insert Wedding Date">
        </div>
                <?php } ?>
        </form>