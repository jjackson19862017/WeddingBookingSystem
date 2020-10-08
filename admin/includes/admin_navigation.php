<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="index.php">W B S</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="index.php"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-wrench"></i> Users<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
            <a href="users.php"><i class="fa fa-search-plus"></i> All Users</a>
            </li>
            <li class="divider"></li>
            <li>
            <a href="users.php?source=add_user"><i class="fa fa-users-cog"></i> Add User</a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Customers<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
            <a href="customer_details.php"><i class="fa fa-search-plus"></i> View All Customers</a>
            </li>
            <li class="divider"></li>
            <li>
            <a href="customer_details.php?source=add_customer"><i class="fa fa-users-cog"></i> Add Customer</a>
            </li>
        </ul>
    </li>

    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-ring"></i> Wedding<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
            <a href="weddings.php"><i class="fa fa-search-plus"></i> View All Weddings</a>
            </li>
            <li class="divider"></li>
            <li>
            <a href="weddings.php?source=add_wedding"><i class="fa fa-calendar-plus"></i> Add Wedding</a>

            </li>
        </ul>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fas fa-house-user"></i> <?php echo $_SESSION['wbs_username'] ;?><b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li>
                <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
        </ul>
    </li>

    </ul>

    <form action="search.php" method="post" class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
    </form>
  </div>
</nav>




