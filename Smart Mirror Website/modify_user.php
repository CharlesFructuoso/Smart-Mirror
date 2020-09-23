<!DOCTYPE html>
<html lang="en">
<head>
<title>Modify User</title>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="images/ico.png">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="SportFIT template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/blog.css">
<link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">
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
		<div class="background_image" style="background-image:url(images/about_page.jpg)"></div>
		<div class="overlay"></div>
		<div class="home_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="home_content">
							<div class="home_title">Change your options</div>
							<div class="home_subtitle">Setup your mirror</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container">
						<div class="section_subtitle">welcome to you</div>
						<div class="section_title">Enter your new info </div>
					</div>
				</div>
			</div>
			

	<!-- Subscription Form -->
	<div class="contact">
		<div class="container">
			<div class="row">
				<!-- Contact Content -->
				<div class="col-lg-4">
					<div class="contact_content">
						<div class="contact_logo">
							<div class="logo d-flex flex-row align-items-center justify-content-start">
								<div>Smart<span>mirror</span></div></div>
						</div>
					</div>
				</div>

				<!-- Modify Form -->
				<div class="col-lg-8 contact_col">
					<div class="contact_form_container">

						<form method="post" action="modify_user2.php"  id="new_form" class="contact_form">
							<div class="row">
								<div class="col-lg-6">
									<div class="input_item"><input type="text" name="name" class="contact_input trans_200" placeholder="User name" required="required"></div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="input_item"><input type="text" name="agenda" class="contact_input trans_200" placeholder="New agenda link" ></div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<fieldset>
  										<legend>What do you want to see displayed on your mirror?</legend>
 										 <div>
 										 		<input type="hidden" id="YNagenda" name="YNagenda" value="0">
    											<input type="checkbox" id="YNagenda" name="YNagenda" value="1">
    											<label for="YNagenda">Agenda</label>
  										</div>
	  									<div>
	  											<input type="hidden" id="YNnews" name="YNnews" value="0">
	    										<input type="checkbox" id="YNnews" name="YNnews" value="1">
	    										<label for="YNnews">News feed</label>
	  									</div>
	  									<div>
	  											<input type="hidden" id="YNweather" name="YNweather" value="0">
	    										<input type="checkbox" id="YNweather" name="YNweather" value="1">
	    										<label for="YNweather">Weather</label>
	  									</div>
	  									<div>
	  											<input type="hidden" id="YNclock" name="YNclock" value="0">
	    										<input type="checkbox" id="YNclock" name="YNclock" value="1">
	    										<label for="YNclock">Clock</label>
	  									</div>
	  									<div>
	  											<input type="hidden" id="YNcompliments" name="YNcompliments" value="0">
	    										<input type="checkbox" id="YNcompliments" name="YNcompliments" value="1">
	    										<label for="YNcompliments">Compliments</label>
	  									</div>
									</fieldset>
								</div>
							</div>
							<button class="contact_button button">Send<span></span></button>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>
				


			</div>

		</div>
	</div>

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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/blog.js"></script>
</body>
</html>