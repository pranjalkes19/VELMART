<?php require_once("../resources/config.php"); ?>
<?php require_once("requirelogin.php"); ?>

<?php
	// session_start();
	// if(!isset($_SESSION['loggedin'])) {
	// 	echo 123456;
	// 	header("location: login.php");
	// 	exit;	
	// }
	// session_abort();
	// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
			
	// }
	// else {
	// 	header("location: login.php");
	// 	exit;
	// }
	// $has_session = session_status() == PHP_SESSION_ACTIVE;
	// echo $has_session;
	// if ($has_session)
	// session_start();
	// if (session_status() !== PHP_SESSION_DISABLED) {
	// 	echo 123456;
		// header("location: login.php");
		// exit;
	// }

	// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']=false){
	// 	header("location: login.php");
	// 	exit;
	// }

	// if(!isset($_SESSION['loggedin']) && $_SESSION['loggedin']=false){
	// 	header("location: login.php");
	// 	exit;
	// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" href="./img/favicon.png" />
	<title>Cart</title>

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
				<!-- <form id="checkout-form" class="clearfix"> -->

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Cart</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Product</th>
										<th class="text-center">Price</th>
										<th></th>
										<th class="text-center">Quantity</th>
										<th class="text-center">Total</th>
										<th class="text-right">Delete</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$cid = $_SESSION['cid'];
									$sql = "SELECT * FROM cart INNER JOIN product ON cart.pid=product.pid WHERE `cartid` = '$cid'";
									$result = mysqli_query($con, $sql);
									while($row = mysqli_fetch_array($result))
									{
										echo '
									<tr>
										<td class="details">
											<h4><strong>'.$row['pname'].'</h4>
										</td>
										<td class="price text-center"><strong>₹ '.$row['price'].'</strong></td>
										<td></td>
										<td class="qty text-center"><h4><strong>'.$row['quantity'].'</strong></h4></td>
										<td class="total text-center"><strong class="primary-color">₹ '.$row['cost'].'</strong></td>
										<td class="text-right">
											<a href="deletecartproduct.php?pid='.$row['pid'].'" class="main-btn icon-btn"><i class="fa fa-close"></i></button>
										</td>
									</tr>';
									}
									?>
								</tbody>											
								<tfoot>
									<?php
									$sql = "SELECT sum(cost) as total FROM cart INNER JOIN product ON cart.pid=product.pid WHERE `cartid` = '$cid'";
									$result = mysqli_query($con, $sql);
									$row = mysqli_fetch_assoc($result);
									echo'
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total">₹ '.$row['total'].'</th>
									</tr>';
									?>
								</tfoot>
							</table>
							<form action="addorder.php" method="post">
								<div class="pull-right">
									<?php echo '<input type="hidden" name="total" value="'.$row['total'].'">';?>
									<button class="primary-btn" name="checkout">Check Out</button>
								</div>
							</form>
						</div>
					</div>
				<!-- </form> -->
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
