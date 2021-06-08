<?php require_once("../resources/config.php"); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Order Details</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>


    <div class="container-scroller">

      <!-- Navigation Bar Left -->
      <?php include("leftnav.php"); ?>
      <!-- /Navigation Bar Left -->

      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>


      <!-- Navigation Bar Top-->
        <?php include("topnav.php"); ?>
      <!-- /Navigation Bar Top-->

        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <br>
            <div class="row">
              <div class="col-xl-12 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Order Details</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <?php
                        $pid = isset($_GET['pid']) ? $_GET['pid'] : '';
                        $oid = isset($_GET['oid']) ? $_GET['oid'] : '';
                        $cid = isset($_GET['cid']) ? $_GET['cid'] : '';
                        $sql1 = "SELECT * FROM orderhistory INNER JOIN shippinginfo ON orderhistory.orderid=shippinginfo.oid WHERE orderhistory.orderid = '$oid' AND orderhistory.pid = '$pid' AND orderhistory.cid = '$cid'";
                        $result1 = mysqli_query($con, $sql1);
                        $row1 = mysqli_fetch_assoc($result1);
                        $sql2 = "SELECT * FROM `phonenumber`WHERE oid = '$oid'";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        echo '
                        <thead class="bg-light">
                          <tr>
                            <th>Customer Name</th>
                            <td><p class="mb-0 font-weight-medium">'.$row1['name'].'</p></td>
                          </tr>
                          <tr>
                            <th>Address</th>
                            <td style="word-break:break-all;">'.$row1['addressline1'].', '.$row1['addressline2'].', '.$row1['pin'].'</td>
                          </tr>
                          <tr>
                            <th>Phone No</th>
                            <td>'.$row2['phonenumber'].'</td>
                          </tr>
                          <tr>
                            <th>Amount</th>
                            <td>'.$row1['cost'].'</td>
                          </tr>
                          <tr>
                            <th>Date</th>
                            <td>'.$row1['date'].'</td>
                          </tr>
                        </thead>';
                        ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-12 col-sm-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body px-0 overflow-auto">
                    <h4 class="card-title pl-4">Products</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="bg-light">
                          <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                          </tr>
                        </thead>
                        <tbody>
                          <!-- Table row -->
                          <tr>
                            <?php
                            $sql3 = "SELECT * FROM product INNER JOIN category ON product.catid=category.categoryid WHERE product.pid = '$pid'";
                            $result3 = mysqli_query($con, $sql3);
                            $row3 = mysqli_fetch_assoc($result3);
                            echo '
                            <td>
                              <p class="mb-0 font-weight-medium">'.$pid.'</p>
                            </td>

                            <td>'.$row3['pname'].'</td>
                            <td>'.$row3['categoryname'].'</td>
                            <td>'.$row1['quantity'].'</td>
                            <td>'.$row3['price'].'</td>
                            <td>'.$row1['cost'].'</td>';
                            ?>
                          </tr>
                          <!-- /Table row -->
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="page-header flex-wrap">
              <h3 class="mb-0">
              </h3>
              <div class="d-flex">
                <form action="changestatus.php" method="post" >
                  <?php echo '<input type="hidden" name="pid" value="'.$pid.'">';?>
                  <?php echo '<input type="hidden" name="oid" value="'.$oid.'">';?>
                  <?php echo '<input type="hidden" name="cid" value="'.$cid.'">';?>
                  <button type="submit" class="btn btn-sm ml-3 btn-success" name="complete"> Complete </button>
                </form>
              </div>
            </div>

          </div>
        </div>
        <!-- main-panel ends -->

      </div>





    </div>

    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
