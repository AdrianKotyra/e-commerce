<div class="row">

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php

                    ?>
                    <div class='huge'><?php get_row_count("users") ?></div>
                        <div> Users Accounts</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>

    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                        <i class="fa-solid fa-shoe-prints fa-5x"></i>

                        </div>
                        <div class="col-xs-9 text-right">
                        <?php

                        ?>
                        <div class='huge'><?php get_row_count("products") ?></div>
                            <div> Products</div>
                        </div>
                    </div>
                </div>
                <a href="products.php">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
        </div>
    </div>










    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
</div>