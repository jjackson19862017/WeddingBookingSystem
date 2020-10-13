<form class="well" action="" method="post">
            <?php if($total_unbooked_events == 0){
                        echo "<h5 class='text-center'> There are no weddings to book,<br>please add a couple.</h5>"; 
                        echo "<hr>";
                        echo "<a class='btn btn-block btn-success' role='button' href='customers.php?source=add_customer'><i class='far fa-plus-square'></i> Add Couple</a>";
            } else { 
            ?>
        <div class="form-row">    
            <div class="form-group col-md-3">
                    <label for="event_customer_id">Couple:</label>
            </div>
            <div class="col-md-9">
                <select name="event_customer_id" id="">
                    <?php 
                        $query = "SELECT * FROM customers_details WHERE wedding_booked = 0";
                        $select_customers_Id = mysqli_query($connection, $query);
                        confirmsQuery($select_customers_Id);
                        while($row = mysqli_fetch_assoc($select_customers_Id)) 
                        { 
                        $customer_id = $row['customer_id'];
                        $brides_forename = $row['brides_forename'];
                        $brides_surname = $row['brides_surname'];
                        $grooms_forename = $row['grooms_forename'];
                        $grooms_surname = $row['grooms_surname'];
                        $couple = $brides_forename . " " . $brides_surname . " and " . $grooms_forename . " " . $grooms_surname ;
                        echo "<option value='$customer_id'>{$couple}</option>";
                        }    
                    ?>
                </select>
            </div>
        </div>
        <!-- /Form-row -->
        <div class="form-row">
            <div class="form-group col-md-7">
                <label class="align-middle" for="event_appointment_date">First Appointment Meeting:</label>
            </div>
            <div class="col-md-5">
                <input type="date" name="event_appointment_date" id="" class="form-control">
            </div>
        </div>
        <!-- /Form-row -->
        <div class="form-group">
            <input type="submit" class="btn btn-primary btn-block" name="create_wedding" id="" Value="Insert Wedding">
        </div>
                <?php } ?>
        </form>