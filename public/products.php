<?php require_once("../resources/config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Products</title>
	<link rel="shortcut icon" href="./img/favicon.png" />
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
	<link type="text/css" rel="stylesheet" href="css/style.css?<?php echo rand();?>" />

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

	<!-- section -->
	<div class="section" style="padding-top: 0px;">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<!-- MAIN -->
				<div id="main" class="col-md-12">


					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							<!-- Product Single -->
						<?php
							if (empty($_GET)) {
								$query = "SELECT * FROM `product`";
							}
							else{
								$cid = $_GET["cid"];
								$query = "SELECT * FROM `product` WHERE catid = '$cid' ";
							}
							$queryrun = mysqli_query($con , $query);
							while($row = mysqli_fetch_array($queryrun))
							{
								?>

							<div class="col-md-4 col-sm-6 col-xs-6">
								<?php
									echo '<a href = "product-page.php?pid='.$row['pid'].'" target="_blank" rel="noopener noreferrer">';
								?>
									<div class="product product-single">
										<div class="product-thumb">
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										<?php echo '<img src="data:image/jpeg;base64,',base64_encode($row['productimage']),'" style = "width:360px; height:360px; "/>';?>
										<!-- size of the image = 270 x 360 -->
									</div>
									<div class="product-body">
										<?php echo'<h3 class="product-price">₹ '.$row['price'].'</h3>';?>
										<?php echo'<h2 class="product-name"><a href="product-page.php?pid='.$row['pid'].'" target="_blank" rel="noopener noreferrer">'.$row['pname'].'</a></h2>'; ?>
										<div class="product-btns">
											<?php echo '<a href = "product-page.php?pid='.$row['pid'].'" target="_blank" rel="noopener noreferrer"><button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button></a>'; ?>
										</div>
									</div>
								</div>
							</a>
							</div>
							<?php
							}
							?>
						<!-- /Product Single -->
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->







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
