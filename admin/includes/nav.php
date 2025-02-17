

<?php
$active_page =  basename($_SERVER['PHP_SELF']);
?>
<div class="sidebar" data-color="white" data-active-color="danger">
<div class="logo">
        <a href="../public/index.php" class="simple-text logo-normal">
         H!-Top Sneakers
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <li class="<?= $active_page == 'dashboard.php' ? 'active' : '' ?>">
            <a href="./dashboard.php">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <!-- <li>
            <a href="user.php">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li> -->
          <li class="<?= $active_page == 'users.php' ? 'active' : '' ?>">
            <a href="users.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="<?= $active_page == 'products.php' ? 'active' : '' ?>">
            <a href="products.php">
              <i class="nc-icon nc-tile-56"></i>
              <p>products</p>
            </a>
          </li>
        </ul>
      </div>
</div>