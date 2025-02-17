<?php include("includes/header.php") ?>

<body class="">

  <div class="wrapper ">
    <?php include("includes/nav.php") ?>
    <?php include("includes/top-nav.php")?>
    <div class="main-panel">

      <div class="content">
        <div class="row">

          <div class="col-md-12">
            <div class="card">

            <div class="card-body">
            <?php

            if(isset($_GET["source"])) {
            $source = $_GET["source"];

            }
            else {
                $source = "";
            }
            switch($source) {
                case 'add_users';
                include "includes/pages/users/add_users.php";
                break;

                case 'edit_user';
                include "includes/pages/users/edit_users.php";
                break;


                default: include "includes/pages/users/view_all_users.php";
                break;


            }

            ?>
        </div>
      </div>
    </div>
  </div>
  <?php include("includes/footer.php")?>
</body>

</html>