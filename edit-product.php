
<?php require_once("../resources/config.php"); ?>

<?php
if(isset($_POST['editproduct'])){
  $name = $_POST['name'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
  $pid = $_POST['pid'];
  $sql1 = "UPDATE `product` SET `pname`='$name',`price`='$price',`stock`='$stock' WHERE pid = '$pid'";
  $result1 = mysqli_query($con, $sql1);
  if (count($_FILES) > 0) {
    echo "2";
      if (is_uploaded_file($_FILES['image']['tmp_name'])) {
          $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
          $sql2 = "UPDATE `product` SET `productimage`='{$imgData}' WHERE pid = '$pid'";
          $result2 = mysqli_query($con, $sql2) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));
          if (isset($result2)) {
              header("Location: products.php");
          }
      }
  }
  header("Location: products.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Edit - Product</title>
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
              <div class="col-md-3 grid-margin stretch-card"></div>
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Edit Product</h4>
                    <br>
                    <?php
                    $pid = isset($_GET['pid']) ? $_GET['pid'] : '';
                    $sql1 = "SELECT * FROM product WHERE pid = '$pid'";
                    $result1 = mysqli_query($con, $sql1);
                    $row = mysqli_fetch_assoc($result1);

                    echo '
                      <form class="forms-sample" action="edit-product.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="'.$row['pname'].'"/>
                        </div>
                        <div class="form-group">
                          <label for="price">Price</label>
                          <input type="text" class="form-control" id="price" placeholder="Price" name="price" value="'.$row['price'].'"/>
                        </div>
                        <div class="form-group">
                          <label for="stock">Stock</label>
                          <input type="text" class="form-control" id="stock" placeholder="Stock" name="stock" value="'.$row['stock'].'"/>
                        </div>
                        <div class="form-group">
                          <label for="image">Image (Square)</label><br>
                          <input type="file" id="myFile" name="image">
                        </div>
                        <br>
                          <input type="hidden"  name="pid" value="'.$pid.'"/>
                        <button type="submit" class="btn btn-primary mr-2" name="editproduct"> Submit </button>
                      </form>';
                    ?>
                  </div>
                </div>
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
