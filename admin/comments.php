<?php include("includes/header.php") ?>

<body class="">

  <div class="wrapper ">
    <?php include("includes/nav.php") ?>
    <?php include("includes/top-nav.php")?>
    <div class="main-panel">

      <div class="content">
        <div class="row">

          <div class="col-md-12">
            <a href="comments.php"><h3>COMMENTS</h3></a>
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
                case 'check_comment';
                include "includes/pages/comments/check_comment.php";
                break;



                default: include "includes/pages/comments/view_all_comments.php";
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