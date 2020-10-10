<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="index.php">W B S</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <div class="dropdown mx-1">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-wrench"></i> Users
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="users.php"><i class="fa fa-search-plus"></i> All Users</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="users.php?source=add_user"><i class="fa fa-users-cog"></i> Add User</a>
        </div>
      </div>

      <div class="dropdown mx-1">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user"></i> Customers
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="customers.php"><i class="fa fa-search-plus"></i> View All Customers</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="customers.php?source=add_customer"><i class="far fa-plus-square"></i></i> Add Customer</a>
        </div>
      </div>
  
      <div class="dropdown mx-1">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-ring"></i> Wedding
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="weddings.php"><i class="fa fa-search-plus"></i> View All Weddings</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="weddings.php?source=add_wedding"><i class="fa fa-calendar-plus"></i> Add Wedding</a>
          <a class="dropdown-item" href="weddings.php?source=add_wedding_quick"><i class="fa fa-calendar-plus"></i> Add Wedding Quick</a>

        </div>
      </div>

    </ul>
    <div class="dropdown mx-1">
        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-house-user"></i> <?php echo $_SESSION['wbs_username'] ;?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
          
        </div>
      </div>
    <form action="search.php" method="post" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Bride/Groom Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit"><i class="fas fa-search"></i> Search</button>
    </form>
  </div>
  
</nav>




