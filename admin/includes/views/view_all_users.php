
<!--
<table class = "table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Role</th>
                                        <th>Salt</th>
                                        <th>Admin</th>
                                        <th>Owner</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                        
                                    </tr>
                                </thead>
                                <tbody> -->


                            <?php 
                            
                            view_all_users();
                            
                            ?>
                         <!--       </tbody>
                            </table> -->

                            <?php 

if(isset($_GET['change_to_super'])) {
                                        
    $the_user_id = $_GET['change_to_super'];
    $query = "UPDATE wbs_users SET user_role = 1 WHERE user_id = $the_user_id";
    $changeToSuperQuery = mysqli_query($connection, $query);
    confirmsQuery($changeToSuperQuery);
    header("Location: users.php"); // Refreshes Page
    }

                                if(isset($_GET['change_to_admin'])) {
                                        
                                    $the_user_id = $_GET['change_to_admin'];
                                    $query = "UPDATE wbs_users SET user_role = 2 WHERE user_id = $the_user_id";
                                    $changeToAdminQuery = mysqli_query($connection, $query);
                                    confirmsQuery($changeToAdminQuery);
                                    header("Location: users.php"); // Refreshes Page
                                    }

                                if(isset($_GET['change_to_owner'])) {

                                    $the_user_id = $_GET['change_to_owner'];
                                    $query = "UPDATE wbs_users SET user_role = 3 WHERE user_id = $the_user_id";
                                    $changeToOwnerQuery = mysqli_query($connection, $query);
                                    confirmsQuery($changeToOwnerQuery);
                                    header("Location: users.php"); // Refreshes Page
                                }
                            
                            if(isset($_GET['delete'])) {
        
                                $deleteuserId = $_GET['delete'];
                                $query = "DELETE FROM wbs_users WHERE user_id = {$deleteuserId}";
                                $deleteQuery = mysqli_query($connection, $query);
                                header("Location: users.php"); // Refreshes Page
                            }
                            
                            
                            
                            ?>


