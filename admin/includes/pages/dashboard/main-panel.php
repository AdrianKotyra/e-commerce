<div class="main-panel">
      <div class="content">
      <a href="dashboard.php"><h3>DASHBOARD</h3></a>
        <!-- charts panel small carts -->
        <div class="row">

          <?php include("includes/pages/dashboard/charts-panel-carts.php")?>

        </div>
        <!-- BIG chart panel -->
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
                <div class="card-header ">
                  <h5 class="card-title">20 most purchased products </h5>

                </div>

                <div id="chart_div_products_order_counts"  style="width: 100%; height: 100%;"></div>

              </div>

            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">50 most viewed products </h5>

              </div>

              <div id="chart_div_views"  style="width: 100%; height: 100%;"></div>

            </div>

            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Top 50 Lowest stock products </h5>

              </div>

              <div id="chart_div_stock"  style="width: 100%; height: 100%;"></div>

            </div>

            <div class="card">
              <div class="card-header ">
                <h5 class="card-title">Products genders distribution </h5>

              </div>

              <div id="chart_div_genders"  style="width: 100%; height: 100%;"></div>

            </div>

            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Feedbacks counter</h5>

              </div>

              <div id="barchart_feedback" style="width: 100%; height: 100%;"></div>

            </div>



          </div>
        </div>

      </div>

    </div>
  </div>