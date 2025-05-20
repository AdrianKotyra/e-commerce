<?php include("includes/header.php") ?>

<body class="">

  <div class="wrapper ">
    <?php include("includes/nav.php") ?>
    <?php include("includes/top-nav.php")?>
    <div class="main-panel">

      <div class="content">
        <div class="row">

          <div class="col-md-12">
            <a href="team.php"><h3>TEAM</h3></a>
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
                case 'add_team_member';
                include "includes/pages/team/add_team_member.php";
                break;

                case 'edit_team_member';
                include "includes/pages/team/edit_team_members.php";
                break;



                default: include "includes/pages/team/view_all_team_members.php";
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