<?php include "includes/db.php"; // This makes the $connection variable work.?> 
<?php include "includes/header.php"; // This loads the top bit of the HTML?> 

<!-- Navigation -->
<?php include "includes/navigation.php"; // This loads the navigation settings of the webpage.?> 

<!-- Page Content -->
<form class="form-signin" action="includes/login.php" method="post">
  <img class="mb-4" src="static/imgs/mill.jpg" alt="" width="300" height="300">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <label for="username" class="sr-only">Username</label>
  <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
  <label for="password" class="sr-only">Password</label>
  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>

</form>

<!-- Footer -->
<?php include "includes/footer.php";?>