
<?php require_once("../resources/config.php");?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>FAQ</title>
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
				<form action="addfaq.php" id="checkout-form" class="clearfix" method="post">
					<div class="col-md-6">
						<div>
							<div class="section-title">
								<h4 class="title">FAQ</h4>
							</div>
							<?php
							$sql = "SELECT * FROM `faq`";
							$result = mysqli_query($con, $sql);
							while($row=mysqli_fetch_array($result)){
								echo '
							<p>
								<strong>'.$row['question'].'</strong>
							</p>
							<p>'.$row['answer'].'</p>
							<hr>';
							}
							?>
						</div>
					</div>

					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Post Your Question</h3>
							</div>
							<div class="form-group">
								<label for="category">Question</label>
								<textarea rows="10" cols="30" class="form-control" id="category" placeholder="Question" name="question"></textarea>
							  </div>
							<div class="form-group">
								<button class="primary-btn" name="addques">Add Question</button>
							</div>
						</div>
					</div>


				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->

	<!-- FOOTER -->
	<footer id="footer" class="section section-grey">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<h3>Arihant Marketing</h3>
					<p>arihantmarketing@gmail.com</p>
					<p>+91 98765 98765</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, odit quae facilis, non asperiores inventore</p>
				</div>
			</div>
			<!-- /row -->
			<hr>
			<!-- row -->
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<!-- footer copyright -->
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> <strong>ARIHANT MARKETING</strong> All rights reserved
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
					<!-- /footer copyright -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
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
