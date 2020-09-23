<!DOCTYPE html>
<html lang="en">
<head>
<title>New user</title>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="images/ico.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="SportFIT template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/services.css">
<link rel="stylesheet" type="text/css" href="styles/services_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
</head>
<body>

<div class="super_container">
	
		<!-- Header -->

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="header_content d-flex flex-row align-items-center justify-content-start trans_400">
						<a href="index.html">
							<div class="logo d-flex flex-row align-items-center justify-content-start">
								<div>Smart<span>Mirror</span></div></div>
						</a>
						<nav class="main_nav">
							<ul class="d-flex flex-row align-items-center justify-content-start">
								<li><a href="index.html">Home</a></li>
								<li><a href="about.html">About us</a></li>
								<li><a href="new_user.php">New user</a></li>
								<li><a href="modify_user.php">Modify existing account</a></li>
								<li><a href="contact.html">Contact</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Hamburger -->
	
	<div class="hamburger_bar trans_400 d-flex flex-row align-items-center justify-content-start">
		<div class="hamburger">
			<div class="menu_toggle d-flex flex-row align-items-center justify-content-start">
				<span>menu</span>
				<div class="hamburger_container">
					<div class="menu_hamburger">
						<div class="line_1 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
						<div class="line_2 hamburger_lines" style="visibility: inherit; opacity: 1;"></div>
						<div class="line_3 hamburger_lines" style="transform: matrix(1, 0, 0, 1, 0, 0);"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Menu -->

	<div class="menu trans_800">
		<div class="menu_content d-flex flex-column align-items-center justify-content-center text-center">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">About us</a></li>
				<li><a href="new_user.php">New user</a></li>
				<li><a href="modify_user.php">Modify existing account</a></li>
				<li><a href="contact.html">Contact</a></li>
			</ul>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="background_image" style="background-image:url(images/services.jpg)"></div>
		<div class="overlay"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">New user</div>
							<div class="home_subtitle">Register and setup your mirror</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<?php
$name = $_POST['name'];
$agenda_link = $_POST['agenda'];

$YNagenda = $_POST['YNagenda'];
$YNnews = $_POST['YNnews'];
$YNweather = $_POST['YNweather'];
$YNclock = $_POST['YNclock'];
$YNcompliments = $_POST['YNcompliments'];

 
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost;dbname=user_mirror;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

$count = $bdd->prepare("SELECT COUNT(*) AS nbr FROM user WHERE name=?");
$count->execute(array($_POST['name']));
$req  = $count->fetch(PDO::FETCH_ASSOC);

if ($req['nbr']!=0) { 
?>

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="contact_content">
						<div class="contact_logo">
							<div class="logo d-flex flex-row align-items-center justify-content-start"><div>Smart<span>mirror</span></div></div>
						</div>
					</div>
				</div>

				<div class="col-lg-8 contact_col">
					<div class="contact_title"><?php echo $name ?> already exists, try with another username</div>
						<button class="contact_button button"> <a href="new_user.php">Try again<span></span></button>
				</div>

			</div>
		</div>
	</div>
<?php } 
else { 
	$req = $bdd->prepare('INSERT INTO user(name, agenda_link, YNagenda, YNnews, YNweather, YNclock, YNcompliments) VALUES(:name, :agenda, :NYagenda, :NYnews, :NYweather, :NYclock, :NYcompliments)');
$req->execute(array('name' => $name,
					'agenda' => $agenda_link,
					'NYagenda' => $YNagenda,
					'NYnews' => $YNnews,
					'NYweather' => $YNweather,
					'NYclock' => $YNclock,
					'NYcompliments' => $YNcompliments)); ?>

	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="contact_content">
						<div class="contact_logo">
							<div class="logo d-flex flex-row align-items-center justify-content-start"><img src="images/dot.png" alt=""><div>Smart<span>mirror</span></div></div>
						</div>
					</div>
				</div>

				<div class="col-lg-8 contact_col">
					<div class="contact_title">New user <?php echo $name ?> successfully created. <br> <br> 
												<b>Now go to in front of your mirror. </b><br> <br> 
												<b>Pictures will be taken in 30 seconds.</b></div><br> 
				</div>

			</div>
		</div>
	</div>
<?php 
}
?>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="footer_container">
						<div class="footer_content">
							<div class="footer_logo">
								<a href="#">
									<div class="logo d-flex flex-row align-items-center justify-content-center">
										<div>Smart<span>Mirror</span></div></div>
								</a>
							</div>
							<nav class="footer_nav">
								<ul class="d-flex flex-sm-row flex-column align-items-sm-start align-items-center justify-content-center">
									<li><a href="index.html">Home</a></li>
									<li><a href="about.html">About us</a></li>
									<li><a href="new_user.php">New user</a></li>
									<li><a href="modify_user.php">Modify existing account</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</nav>

							<div class="copyright d-flex flex-row align-items-start justify-content-sm-end justify-content-center">
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This website is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by Charles & William</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="js/services.js"></script>
</body>
</html>