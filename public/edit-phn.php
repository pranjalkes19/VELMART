<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" href="./img/favicon.png" />
    <title>Edit Phone Number</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css?<?php echo rand(); ?>" />


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
    <!-- HEADER AND NAVIGATION -->
    <?php include("nav.php"); ?>
    <!-- /HEADER AND NAVIGATION -->


    <br>
    <br>
    <?php 
        $cid = $_SESSION['cid'];
        $sql = "SELECT * FROM `customer` WHERE `cid`='$cid'";
        $result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
        $phonenumber= $row['cphonenumber']; 
    ?>

    <!-- Edit name section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<form action = "save-phn.php" method = "post">
				<div class="row">
					<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="section-title">
								<h3 class="title">Change Your Number</h3>
							</div>
                            <p>If you want to change the phone number associated with your customer account, you may do so below. Be sure to click the Save Changes button when you are done.</p>
							<hr>
                            <p><strong>New Phone</strong></p>
							<div class="form-group">
								<input class="input" type="tel" name="phn" value="<?php echo $phonenumber ?>">
							</div>
							<div class="pull-right">
								<button class="primary-btn">Save Changes</button>
							</div>
						</div>
					<div class="col-md-3"></div>
				</div>
			</form>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Edit name section -->

	<br>
	<br>



    <!-- FOOTER -->
    <?php include("footer.php"); ?>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>