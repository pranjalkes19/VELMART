
<?php require_once("../resources/config.php");?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<?php
	$pid = isset($_GET['pid']) ? $_GET['pid'] : '';
	$query = "SELECT * FROM `product` WHERE pid = '$pid' ";
	$queryrun = mysqli_query($con , $query);
	$row = mysqli_fetch_assoc($queryrun);
	?>
	<?php echo '<title>'.$row["pname"].'</title>';?>
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
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!--  Product Details -->
				<?php
				$pid = isset($_GET['pid']) ? $_GET['pid'] : '';
				$query = "SELECT * FROM `product` WHERE pid = '$pid' ";
				$queryrun = mysqli_query($con , $query);
				$row = mysqli_fetch_assoc($queryrun);
				?>
				<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">
							<div class="product-view" style = "width:500px; height: 500px;">
								<?php echo '<img src="data:image/jpeg;base64,',base64_encode($row['productimage']),'"/>';?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="product-body">
							<br><br><?php echo '<h1 class="product-name">'.$row['pname'].'</h1>';?><br>
							<?php echo '<h2 class="product-price">₹ '.$row['price'].'</h2>';?><br>
							
							<?php if ($row['stock']==0){
								echo '<h1>Sold Out</h1>
								<h3>This item is currently out of stock</h3>
								';
							} 
							else {
								echo '<form action="addcart.php" method="post">
								<div class="product-btns">
										<div class="qty-input">
											<span class="text-uppercase">QTY: </span>
											<input class="input" type="number" value="1" name="qty">
										</div>
										<input type="hidden" name="pid" value="'.$pid.'">
										<button class="primary-btn add-to-cart" name="add"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
								</div>
							</form>';
							} ?>
							
							
						</div>
					</div>
					<div class="col-md-12">
						<div class="product-tab">
							<ul class="tab-nav">
								<li><a data-toggle="tab" >Reviews</a></li>
							</ul>
								<div  class="tab-pane fade in">
									<div class="row">
										<div class="col-md-6">
											<div class="product-reviews">
												<?php
												$sql = "SELECT * FROM review INNER JOIN customer ON review.cid=customer.cid WHERE `pid` = '$pid'";
												$result = mysqli_query($con, $sql);
												while($row = mysqli_fetch_array($result)){
												echo '
												<div class="single-review">
													<div class="review-heading">
														<div><a href="#"><i class="fa fa-user-o"></i> '.$row['cname'].'</a></div>
													</div>
													<div class="review-body">
														<p>'.$row['review'].'</p>
													</div>
												</div>';
												}
												?>
											</div>
										</div>
										<div class="col-md-6">
											<h4 class="text-uppercase">Write Your Review</h4>
											<p>Your email address will not be published.</p>
											<form action="addreview.php" method="post" class="review-form">
												<div class="form-group">
													<textarea class="input" name="review" placeholder="Your review" required></textarea>
												</div>
												<?php echo '<input type="hidden" name="pid" value="'.$pid.'">';?>
												<button type="submit" class="primary-btn" name="addreview">Submit</button>
											</form>
										</div>
									</div>



								</div>
						</div>
					</div>

				</div>
				<!-- /Product Details -->
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
