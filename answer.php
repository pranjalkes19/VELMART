

<?php require_once("../resources/config.php");?>


<?php
  if(isset($_POST['submitanswer'])){
    $cid = $_POST["cid"];
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $query = "UPDATE `faq` SET `answer`='$answer' WHERE `question` = '$question' AND `cid` = '$cid'";
    $queryrun = mysqli_query($con , $query);
    header("location: faq.php");
  }





?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Add - Answer</title>
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
                    <h4 class="card-title">FAQ</h4>
                    <br>
                    <?php
                    $question = isset($_GET['question']) ? $_GET['question'] : '';
                    $cid = isset($_GET['cid']) ? $_GET['cid'] : '';
                    $sql = "SELECT * FROM faq WHERE `question` = '$question' AND `cid` = '$cid'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_assoc($result);
                    $answer = $row['answer'];
                    echo '
                    <form action="answer.php" method="post" class="forms-sample">
                      <div class="form-group">
                        <label for="name">Question</label>
                        <p>'.$question.'</p>
                      </div>
                      <div class="form-group">
                        <label for="category">Answer</label>
                        <input type="text" class="form-control" id="category" placeholder="Answer" name="answer" value="'.$answer.'"/>
                      </div>
                      <br>
                      <input type="hidden" name="cid" value="'.$cid.'">
                      <input type="hidden" name="question" value="'.$question.'">
                      <button type="submit" class="btn btn-primary mr-2" name="submitanswer"> Submit </button>
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
