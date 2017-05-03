<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=bootstrap;charset=utf8', 'root', 'SF1960sf');

include 'includes/login.php';
?>
<!DOCTYPE html>

<html>
<head>
		
		<!-- Website Title & Description for Search Engine purposes -->
		<title></title>
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="includes/css/styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
		
		<link rel="shortcut icon" type="image/png" href="images/favicon.ico"/>
</head>
	<body>
	
	<div class="container" id="main">
		<div class="navbar navbar-fixed-top darker">
	<div class="container">
		
		<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	
		<a class="navbar-brand" href="http://localhost/bootstrap/"><img src="images/jmrlogoklein.png" style="height: 102.5px; width: 102.5px;" alt="JMR Logo" /></a>
		
		<div class="nav-collapse collapse navbar-responsive-collapse">

			<p class="logo-text">JMR Communication Service</p><br>
			<p class="logo-slogan text-muted">Wij zijn gespecialiseerd in web-development, reclame, logo's, computer training en app-development.</p>
			
			<ul class="nav navbar-nav pull-right">
				<a href="#loginModal" role="button" class="btn btn-info" id="login-butt" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Register/Log In</a>
			</ul>

			<ul class="nav navbar-nav float-off">
				<li class="active">
					<a href="http://localhost/bootstrap/" style="background: #5BC0DE; color: #FFFFFF;">Home</a>
				</li>
				
				<li class="dropdown">
					<a href="#" style="background: #8AC52B; color: #FFFFFF;" class="dropdown-toggle" data-toggle="dropdown">Producten <strong class="caret pull-right" style="border-top-color: #FFFFFF; margin-top: 7px;"></strong></a>

					<ul class="dropdown-menu dropdown-extra">
						<li class="dropdown-header header-extra">
							<a href="http://localhost/bootstrap/products/index.php?sale=ja">ACTIES</a>
						</li>
						<li class="divider" style="width: 100%;"></li>
						<li>
							<a href="http://localhost/bootstrap/products/index.php?type=phone">Telefoons</a>
						</li>
						<li class="divider" style="width: 100%;"></li>
						<li>
							<a href="http://localhost/bootstrap/products/index.php?type=phone&brand=Apple">Apple</a>
						</li>
						<li>
							<a href="http://localhost/bootstrap/products/index.php?type=phone&brand=Samsung">Samsung</a>
						</li>
						<li class="divider" style="width: 100%;"></li>
						<li>
							<a href="http://localhost/bootstrap/products/index.php?type=logo">Logo's</a>
						</li>
						<li class="divider" style="width: 100%;"></li>
						<li>
							<a href="http://localhost/bootstrap/products/index.php?type=logo&kind=abstract">Abstract</a>
						</li>
						<li>
							<a href="http://localhost/bootstrap/products/index.php?type=logo&kind=typografisch">Typografisch</a>
						</li>
					</ul>
				</li>	
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="background: #FEC000; color: #FFFFFF;">Services <strong class="caret pull-right" style="border-top-color: #FFFFFF; margin-top: 7px;"></strong></a>

					<ul class="dropdown-menu dropdown-extra">
						<li>
							<a href="http://localhost/bootstrap/services/index.php?service=webdev">Web Development</a>
						</li>
						<li>
							<a href="http://localhost/bootstrap/services/index.php?service=appdev">App Applicaties</a>
						</li>
						<li>
							<a href="http://localhost/bootstrap/services/index.php?service=advert">Reclame</a>
						</li>
						<li>
							<a href="http://localhost/bootstrap/services/index.php?service=communication">Communicatie</a>
						</li>
					</ul>
				</li>		
				<li>
					<a href="http://localhost/bootstrap/contact" style="background: #EF6C00; color: #FFFFFF;">Contact</a>
				</li>		
				<li>
					<a href="http://localhost/bootstrap/blog" style="background: #D90016; color: #FFFFFF;">Blog</a>
				</li>
			</ul>
		</div>
	
	</div>
</div>
		
		<?php
			if ($registration == 'complete') {
				echo '<div class="alert alert-success fade in" style="display: block; margin-top: 220px;">
			<strong>Success!</strong><p>Your registration was completed. Please log-in to go to the back-end!</p>
		</div>';
			}

			if ($registration == 'failed') {
				echo '<div class="alert alert-danger fade in" style="display: block; margin-top: 220px;">
			<strong>Oops!</strong><p>Your registration was not completed. Please try again.</p>
		</div>';
			}

			if ($login == 'failed') {
				echo '<div class="alert alert-danger fade in" style="display: block; margin-top: 220px;">
			<strong>Oops!</strong><p>Your password did not match with our recorded password, please try again.</p>
		</div>';
			}
			if ($login == 'logout') {
				echo '<div class="alert alert-danger fade in" style="display: block; margin-top: 220px;">
			<p>You have been logged out or your session has expired.</p>
		</div>';
			}
		?>	

		<div class="carousel slide" id="myCarousel" <?php if ($registration == 'complete') {echo 'style="margin-top: 10px;"';} ?> <?php if ($registration == 'failed') {echo 'style="margin-top: 10px;"';} ?> <?php if ($login == 'failed') {echo 'style="margin-top: 10px;"';} ?> <?php if ($login == 'logout') {echo 'style="margin-top: 10px;"';} ?>>
			<ol class="carousel-indicators">
				<li class="active" data-slide-to="0" data-target="#myCarousel"></li>
				<li data-slide-to="1" data-target="#myCarousel"></li>
				<li data-slide-to="2" data-target="#myCarousel"></li>
			</ol>

			<div class="carousel-inner">
				<div class="item active" id="slide1">
					<div class="carousel-caption">
						
					</div>
				</div>
				<div class="item" id="slide2">
					<div class="carousel-caption">
						<h4>Telefoon traag?</h4>
						<p>Geen probleem, wij maken hem sneller dan ooit! **</p>
					</div>
				</div>
				<div class="item" id="slide3">
					<div class="carousel-caption">
						<h4>Beter en relaxter met uw PC om leren gaan?</h4>
						<p>Wij hebben d&#233; Computer Training voor u!</p>
					</div>
				</div>
			</div>

			<a class="left carousel-control" data-slide="prev" href="#myCarousel"><span class="icon-prev"></span></a>
			<a class="right carousel-control" data-slide="next" href="#myCarousel"><span class="icon-next"></span></a>
		</div>

		<div class="row" id="featuresHeading">
			<div class="col-12">

			</div>
		</div>

		<div class="row" id="features">
			<div class="col-sm-3 feature">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Acties</h3>
					</div>
					<img src="images/sale.png" alt="Acties" id="gif" />

					<a href="http://localhost/bootstrap/products/index.php?sale=Ja" class="btn btn-danger btn-block">Producten met korting</a>
				</div>
			</div>
			<div class="col-sm-3 feature">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Apple</h3>
					</div>
					<img src="images/applelogo.png" alt="Apple producten" id="gif" />

					<a href="http://localhost/bootstrap/products/index.php?type=phone&brand=Apple" class="btn btn-info btn-block">Apple producten</a>
				</div>
			</div>
			<div class="col-sm-3 feature">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Android</h3>
					</div>
					<img src="images/androidlogo.png" alt="Android producten" id="gif" />

					<a href="http://localhost/bootstrap/products/index.php?type=phone&os=Android" class="btn btn-success btn-block">Android Telefoons</a>
				</div>
			</div>
			<div class="col-sm-3 feature">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Logo's</h3>
					</div>
					<img src="images/jmrlogoklein.png" alt="Onze Logo's" id="gif" />

					<a href="http://localhost/bootstrap/products/index.php?type=logo" class="btn btn-warning btn-block">Onze Logo's</a>
				</div>
			</div>
		</div>

		<div class="row" id="bigCallout">
			<div class="col-12">
				
				<div class="alert alert-danger alert-block fade in" id="successAlert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>

					<h4>We're sorry!</h4>
					<p>We're sorry to inform you that this "alert message" is litterally useless.. Click the "x" in the top right corner to close this message!</p>
				</div>

				<div class="well well-small visible-sm">
					<a href="" class="btn btn-large btn-block btn-default"><span class="glyphicon glyphicon-phone"></span>Give us a call!</a>
				</div>

				<div class="well">
					<div class="page-header">
						<h1>A Fancy Header <small>A subheader for extra awesome.</small></h1>
					</div>
					<p class="lead">Some solid leading copy will help get your users engaged. Use this area to come up with something real nice. Know what I'm sayin?</p>
					<a href="" class="btn btn-large btn-primary" id="alertMe">Click Here!</a>
					<a href="" class="btn btn-large btn-link">Click Here Aswell!</a>
				</div>
			</div>
		</div>

		<div class="row" id="moreInfo">
			<div class="col-sm-6">
				<h3>Neat Tabbable Content</h3>
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
						<li><a href="#tab2" data-toggle="tab">Section 2</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab1">
							<h4><span class="glyphicon glyphicon-map-marker"></span> My Location <small>You really thought I'd tell where I live?</small></h4>
							
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6328346.683843662!2d-74.45507739917602!3d24.190660908800627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89451ab5034cb7ab%3A0xb600ecf3df7aca4d!2sBermudadriehoek!5e0!3m2!1snl!2snl!4v1486032729723" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
							
							<h4>Here's some Hipsteripsum for you!</h4>

							<p>Cronut subway tile etsy gastropub, seitan farm-to-table gochujang fixie meditation iceland. Kombucha polaroid flannel blog quinoa umami. Sriracha microdosing snackwave, retro hammock knausgaard fingerstache narwhal cred brooklyn farm-to-table kombucha organic fam kickstarter. Migas pour-over humblebrag, cold-pressed pork belly waistcoat echo park. Schlitz chia VHS everyday carry. Green juice mustache crucifix lyft kogi mixtape. Snackwave disrupt franzen farm-to-table migas vape.</p>

							<p>Cronut subway tile etsy gastropub, seitan farm-to-table gochujang fixie meditation iceland. Kombucha polaroid flannel blog quinoa umami. Sriracha microdosing snackwave, retro hammock knausgaard fingerstache narwhal cred brooklyn farm-to-table kombucha organic fam kickstarter. Migas pour-over humblebrag, cold-pressed pork belly waistcoat echo park. Schlitz chia VHS everyday carry. Green juice mustache crucifix lyft kogi mixtape. Snackwave disrupt franzen farm-to-table migas vape.</p>
						</div>
						<div class="tab-pane" id="tab2">
							<h4>A Left Floated Picture <small>Using Placekitten.com</small></h4>

							<img src="http://placekitten.com/140/140" class="thumbnail pull-left" />
							<p>Cronut subway tile etsy gastropub, seitan farm-to-table gochujang fixie meditation iceland. Kombucha polaroid flannel blog quinoa umami. Sriracha microdosing snackwave, retro hammock knausgaard fingerstache narwhal cred brooklyn farm-to-table kombucha organic fam kickstarter. Migas pour-over humblebrag, cold-pressed pork belly waistcoat echo park. Schlitz chia VHS everyday carry. Green juice mustache crucifix lyft kogi mixtape. Snackwave disrupt franzen farm-to-table migas vape.</p>

							<p>Cronut subway tile etsy gastropub, seitan farm-to-table gochujang fixie meditation iceland. Kombucha polaroid flannel blog quinoa umami. Sriracha microdosing snackwave, retro hammock knausgaard fingerstache narwhal cred brooklyn farm-to-table kombucha organic fam kickstarter. Migas pour-over humblebrag, cold-pressed pork belly waistcoat echo park. Schlitz chia VHS everyday carry. Green juice mustache crucifix lyft kogi mixtape. Snackwave disrupt franzen farm-to-table migas vape.</p>

							<hr>

							<a href="#myModal" role="button" class="btn btn-warning" data-toggle="modal"><span class="glyphicon glyphicon-hand-up"></span> Click for a Modal Window!</a>
							<div class="modal fade" id="myModal">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">A Modal Window</h4>
										</div>
										<div class="modal-body">
											<h4>Text in a Modal</h4>

											<p>Cronut subway tile etsy gastropub, seitan farm-to-table gochujang fixie meditation iceland. Kombucha polaroid flannel blog quinoa umami. Sriracha microdosing snackwave, retro hammock knausgaard fingerstache narwhal cred brooklyn farm-to-table kombucha organic fam kickstarter. Migas pour-over humblebrag, cold-pressed pork belly waistcoat echo park. Schlitz chia VHS everyday carry. Green juice mustache crucifix lyft kogi mixtape. Snackwave disrupt franzen farm-to-table migas vape.</p>

											<h4>Popovers in a modal</h4>
											<a href="#" class="btn btn-danger pop" data-toggle="popover" data-placement="top" data-original-title="You clicked it!" data-content="I knew you would!">Don't click this button!</a>

											<h4>Tooltips in a modal</h4>
											<a href="" data-original-title="Tooltip" rel="tooltip">This link</a> should have a tooltip, and so should <a href="" data-original-title="Woohoo!" rel="tooltip">this one</a>!

											<hr>

											<p><small class="text-muted">PS. This form doesn't do anything. Just a heads up.</small></p>

											<form class="form-horizontal">
												<div class="form-group">
													<label class="col-lg-2 control-label" for="inputName">Name</label>
													<div class="col-lg-10">
														<input class="form-control" id="inputName" placeholder="Name" type="text">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label" for="inputEmail">Email</label>
													<div class="col-lg-10">
														<input class="form-control" id="inputEmail" placeholder="Email" type="email">
													</div>
												</div>
												<div class="form-group">
													<label class="col-lg-2 control-label" for="inputMessage">Message</label>
													<div class="col-lg-10">
														<textarea class="form-control" id="inputMessage" placeholder="Message" rows="3"></textarea>
														<button class="btn btn-success pull-right" type="submit">Send!</button>
													</div>
												</div>
											</form>

										</div>
										<div class="modal-footer">
												<button class="btn btn-default" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" type="button">Save Changes</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<h3>Some Text Info</h3>
				<p>Cronut subway tile etsy gastropub, seitan farm-to-table gochujang fixie meditation iceland. Kombucha polaroid flannel blog quinoa umami. Sriracha microdosing snackwave, retro hammock knausgaard fingerstache narwhal cred brooklyn farm-to-table kombucha organic fam kickstarter. Migas pour-over humblebrag, cold-pressed pork belly waistcoat echo park. Schlitz chia VHS everyday carry. Green juice mustache crucifix lyft kogi mixtape. Snackwave disrupt franzen farm-to-table migas vape.</p>

				<h4>A List Group</h4>

				<div class="list-group">
					<a href="https://en.wikipedia.org/wiki/Kale" target="_blank" class="list-group-item">
						<h4 class="list-group-item-heading">Kale</h4>
						<p class="list-group-item-text">Kale or borecole is a vegetable with green or purple leaves, in which the central leaves do not form a head.</p>
					</a>
					<a href="https://en.wikipedia.org/wiki/Carrot" target="_blank" class="list-group-item">
						<h4 class="list-group-item-heading">Carrots</h4>
						<p class="list-group-item-text">The carrot is a root vegetable, usually orange in colour, though purple, red, white and yellow varieties exist. It has a crisp texture when fresh.</p>
					</a>
					<a href="https://en.wikipedia.org/wiki/Steel-cut_oats" target="_blank" class="list-group-item">
						<h4 class="list-group-item-heading">Steel-cut oats</h4>
						<p class="list-group-item-text">Steel-cut oats are whole grain groats which have been cut into pieces. They are commonly used in Scotland and Ireland to make porridge</p>
					</a>
				</div>

				<h5>A small heading</h5>
				<p>Cronut subway tile etsy gastropub, seitan farm-to-table gochujang fixie meditation iceland. Kombucha polaroid flannel blog quinoa umami. Sriracha microdosing snackwave, retro hammock knausgaard fingerstache narwhal cred brooklyn farm-to-table kombucha organic fam kickstarter. Migas pour-over humblebrag, cold-pressed pork belly waistcoat echo park. Schlitz chia VHS everyday carry. Green juice mustache crucifix lyft kogi mixtape. Snackwave disrupt franzen farm-to-table migas vape.</p>

			</div>
		</div>
		
		<hr>

		<div class="row" id="moreCourses">
			<div class="col-12">
				<h3>Learn more about Web Design</h3>
				<div class="thumbnails row">
					<div class="col-6">
						<div class="thumbnail">
							<img src="images/euro.jpg" alt="PSD to HTML5 & CSS3"  />
							<div class="label label-success price"><span class="glyphicon glyphicon-tag"></span>$$$</div>

							<div class="caption">
								<h3>For the 100th time..</h3>

								<p>DONATE, RIGHT NOW. I NEEDZ ZE MONEH! I WANT IT, AND I WANT IT RIGHT NOW!</p>

								<p><a href="https://www.udemy.com/build-beautiful-html5-website" class="btn btn-primary btn-small" target="_blank">MANEEEEEEEEEEY</a> <a href="https://www.udemy.com/build-beautiful-html5-website" target="_blank" class="btn btn-small btn-link">Learn More!</a></p>

							</div>
						</div>
					</div>
					<div class="col-6">
						<div class="thumbnail">
							<img src="images/https.jpg" alt="Web Hosting 101"  />
							<div class="label label-info price"><span class="glyphicon glyphicon-tag"></span>FREE!</div>

							<div class="caption">
								<h3>A simple HTML website</h3>

								<p>There are many simple HTML website builders found online, check one of them out right here!</p>

								<p><a href="http://www.wix.com/html5en/hiker-builder?experiment_id=html%20website%20builder%5Ee%5E48579941620%5E1t1&gclid=Cj0KEQiAzsvEBRDEluzk96e4rqABEiQAezEOoGFV5jj2W6BI08uf2j3EtC7pUFJBdiZbpzeusveWuHkaAmme8P8HAQ&utm_campaign=600576476%5E10626116740&utm_medium=cpc&utm_source=google" class="btn btn-primary btn-small" target="_blank">Free Site!</a> <a href="http://www.wix.com/html5en/hiker-builder?experiment_id=html%20website%20builder%5Ee%5E48579941620%5E1t1&gclid=Cj0KEQiAzsvEBRDEluzk96e4rqABEiQAezEOoGFV5jj2W6BI08uf2j3EtC7pUFJBdiZbpzeusveWuHkaAmme8P8HAQ&utm_campaign=600576476%5E10626116740&utm_medium=cpc&utm_source=google" target="_blank" class="btn btn-small btn-link">Learn More!</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
include 'includes/footer.php';
?>
	
	<div class="modal fade" id="loginModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Register</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form" method="post" name="register">
						<div class="form-group">
							<label for="fname" class="col-sm-2 control-label">Firstname</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="fname" placeholder="John" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="lname" class="col-sm-2 control-label">Lastname</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="lname" placeholder="Doe" value="">
							</div>
						</div>
						<div class="form-group">
							<label for="mail" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" name="mail" placeholder="example@domain.com" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="uname" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="uname" placeholder="JohnDoe69" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="pword" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="pword" placeholder="password123" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="repeat" class="col-sm-2 control-label">Repeat</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="repeat" placeholder="Repeat Password" value="" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<input name="submit" type="submit" value="Send" class="btn btn-primary" id="send-butt">
							</div>
						</div>
					</form>	
					
					<h4 class="modal-title">Log in</h4>
					<hr>
					<form class="form-horizontal" role="form" method="post" name="login">
						<div class="form-group">
							<label for="uname" class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="uname" placeholder="Username" value="" required>
							</div>
						</div>
						<div class="form-group">
							<label for="pword" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" name="pword" placeholder="Password" value="" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<input name="submit-log" type="submit" value="Send" class="btn btn-primary" id="send-butt">
							</div>
						</div>
					</form>	
				</div>
				<div class="modal-footer">
					
				</div>
			</div>
		</div>
	</div>
	<!-- All Javascript at the bottom of the page for faster page loading -->
		
	<!-- First try for the online version of jQuery-->
	<script src="http://code.jquery.com/jquery.js"></script>
	
	<!-- If no online access, fallback to our hardcoded version of jQuery -->
	<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="includes/js/script.js"></script>
	
	</body>
</html>