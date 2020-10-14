<form action="" method="post">
                <div class="row">
                <div class="col-xs-12 col-md-5 well mx-auto">

                       <div class="form-group form-inline">
                            <label for="brides_forename">Brides Forename</label>
                            <input type="text" name="brides_forename" id="" class="form-control" value="<?php echo $brides_forename?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="brides_surname">Brides Surname</label>
                            <input type="text" name="brides_surname" id="" class="form-control" value="<?php echo $brides_surname?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="brides_telephone">Brides Telephone</label>
                            <input type="text" name="brides_telephone" id="" class="form-control" value="<?php echo $brides_telephone?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="brides_email">Brides Email</label>
                            <input type="email" name="brides_email" id="" class="form-control" value="<?php echo $brides_email?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 well mx-auto">

                        <div class="form-group form-inline">
                            <label for="grooms_forename">Grooms Forename</label>
                            <input type="text" name="grooms_forename" id="" class="form-control"value="<?php echo $grooms_forename?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="grooms_surname">Grooms Surname</label>
                            <input type="text" name="grooms_surname" id="" class="form-control" value="<?php echo $grooms_surname?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="grooms_telephone">Grooms Telephone</label>
                            <input type="text" name="grooms_telephone" id="" class="form-control" value="<?php echo $grooms_telephone?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="grooms_email">Grooms Email</label>
                            <input type="email" name="grooms_email" id="" class="form-control" value="<?php echo $grooms_email?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-xs-12 col-md-5 well mx-auto">

                        <div class="form-group form-inline">
                            <label for="address_1">Address 1</label>
                            <input type="text" name="address_1" id="" class="form-control" value="<?php echo $address_1?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="address_2">Address 2</label>
                            <input type="text" name="address_2" id="" class="form-control" value="<?php echo $address_2?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="town_city">Town / City</label>
                            <input type="text" name="town_city" id="" class="form-control" value="<?php echo $town_city?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="county">County</label>
                            <input type="text" name="county" id="" class="form-control" value="<?php echo $county?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="post_code">Post Code</label>
                            <input type="text" name="post_code" id="" class="form-control" value="<?php echo $post_code?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5 well mx-auto">

                        <div class="form-group form-inline">
                            <label for="preferred_contact">Preferred Contact</label>
                            <input type="text" name="preferred_contact" id="" class="form-control" value="<?php echo $preferred_contact?>">
                        </div>
                        <div class="form-group form-inline">
                        <label for="wedding_booked">Wedding Booked?<br></label>
                            <div class="form-check form-check-inline">
                                <?php    
                                if($wedding_booked == 1){
                                echo '<input class="form-check-input" type="radio" name="wedding_booked" id="inlineRadio1" value="1" checked>';
                                echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
                                echo '<input class="form-check-input" type="radio" name="wedding_booked" id="inlineRadio2" value="0">';
                                echo '<label class="form-check-label" for="inlineRadio2">No</label>'; 
                                } else {
                                echo '<input class="form-check-input" type="radio" name="wedding_booked" id="inlineRadio1" value="1">';
                                echo '<label class="form-check-label" for="inlineRadio1">Yes</label>';
                                echo '<input class="form-check-input" type="radio" name="wedding_booked" id="inlineRadio2" value="0" checked>';
                                echo '<label class="form-check-label" for="inlineRadio2">No</label>'; 
                                }
                                    ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="edit_customer" id="" Value="Edit Customers Details">
                        </div>
                    </div>
                </div>
            </form>