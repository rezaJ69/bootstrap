<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=bootstrap;charset=utf8', 'root', 'SF1960sf');

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];

	$stmt = $pdo->prepare("SELECT uname, pword, id FROM accounts WHERE id = ?");
	$stmt->bindValue(1, $id);
	$stmt->execute();
}
else {
	header('Location: http://www.google.com');
}

if (isset($_POST['submit'])) {

	$type 		= "phone";
	$brand 		= $_POST['brand'];
	$prodname 	= $_POST['prod_name'];
	$screensize = $_POST['screen_size'];
	$res 		= $_POST['resolution'];
	$storage 	= $_POST['int_storage'];
	$os 		= $_POST['os'];
	$camera 	= $_POST['camera'];
	$frcamera 	= $_POST['fr_camera'];
	$vidres 	= $_POST['vid_resolution'];
	$standby 	= $_POST['stand_by'];
	$fourg 		= $_POST['4g'];
	$bluetooth 	= $_POST['bluetooth'];
	$imgpath 	= $_POST['img_path'];
	$fullspecs  = $_POST['full_specs'];
	$shortspecs = $_POST['short_specs'];
	$price		= $_POST['price'];
	$sale 		= $_POST['sale'];

	$stmt = $pdo->prepare("INSERT INTO products (type, brand, prod_name, screen_size, resolution, int_storage, os, camera, fr_camera, vid_resolution, stand_by, 4g, bluetooth, img_path, full_specs, short_specs, price, sale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bindValue(1, $type);
	$stmt->bindValue(2, $brand);
	$stmt->bindValue(3, $prodname);
	$stmt->bindValue(4, $screensize);
	$stmt->bindValue(5, $res);
	$stmt->bindValue(6, $storage);
	$stmt->bindValue(7, $os);
	$stmt->bindValue(8, $camera);
	$stmt->bindValue(9, $frcamera);
	$stmt->bindValue(10, $vidres);
	$stmt->bindValue(11, $standby);
	$stmt->bindValue(12, $fourg);
	$stmt->bindValue(13, $bluetooth);
	$stmt->bindValue(14, $imgpath);
	$stmt->bindValue(15, $fullspecs);
	$stmt->bindValue(16, $shortspecs);
	$stmt->bindValue(17, $price);
	$stmt->bindValue(18, $sale);
	$stmt->execute();
}

if (isset($_POST['submit-logo'])) {
	$type 		= "logo";
	$brand 		= $_POST['brand'];
	$prodname 	= $_POST['prod_name'];
	$res 		= $_POST['resolution'];
	$imgpath 	= $_POST['img_path'];
	$fullspecs 	= $_POST['full_specs'];
	$shortspecs = $_POST['short_specs'];
	$price 		= $_POST['price'];
	$sale 		= $_POST['sale'];

	$stmt = $pdo->prepare("INSERT INTO products (type, brand, prod_name, resolution, img_path, full_specs, short_specs, price, sale) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bindValue(1, $type);
	$stmt->bindValue(2, $brand);
	$stmt->bindValue(3, $prodname);
	$stmt->bindValue(4, $res);
	$stmt->bindValue(5, $imgpath);
	$stmt->bindValue(6, $fullspecs);
	$stmt->bindValue(7, $shortspecs);
	$stmt->bindValue(8, $price);
	$stmt->bindValue(9, $sale);
	$stmt->execute();

}

if (isset($_POST['submitcat'])) {
	$cat = $_POST['new_cat'];
	$display = $_POST['new_cat_name'];

	$stmt = $pdo->prepare("INSERT INTO categories (name, display) VALUES (?, ?)");
	$stmt->bindValue(1, $cat);
	$stmt->bindValue(2, $display);
	$stmt->execute();
}
?>
<!DOCTYPE html>
<head>
		
		<!-- Website Title & Description for Search Engine purposes -->
		<title></title>
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="../../includes/css/styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="../../includes/js/modernizr-2.6.2.min.js"></script>
		
		<link rel="shortcut icon" type="image/png" href="../../images/favicon.ico"/>
</head>
<html>
	<body>
	
	<div class="container" id="main">
		<div class="navbar navbar-fixed-top darker">
	<div class="container">
		
		<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	
		<a class="navbar-brand" href="http://localhost/bootstrap/"><img src="../../images/jmrlogoklein.png" style="height: 102.5px; width: 102.5px;" alt="JMR Logo" /></a>
		
		<div class="nav-collapse collapse navbar-responsive-collapse">

			<p class="logo-text">JMR Communication Service</p><br>
			<p class="logo-slogan text-muted">Wij zijn gespecialiseerd in web-development, reclame, logo's, computer training en app-development.</p>
			
			<ul class="nav navbar-nav pull-right">
				<a href="#loginModal" role="button" class="btn btn-info" id="login-butt" data-toggle="modal"><span class="glyphicon glyphicon-user"></span> Register/Log In</a>
			</ul>
		</div>
		</div>
		</div>


		<div style="margin-top: 160px; margin-bottom: 20px;" class="panel-group" id="accordion">
		  	<div class="panel panel-default">
		   		<div class="panel-heading">
		      		<h4 class="panel-title">
		        		<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Nieuwe Categorie aanmaken</a>
		      		</h4>
		    	</div>
		    	<div id="collapse1" class="panel-collapse collapse">
		      		<div class="panel-body">
						<form class="form-horizontal" role="form" method="post" name="chooseType">
							<div class="form-group">
								<label for="new_cat" class="col-sm-2 control-label">Nieuwe Categorie</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="new_cat" placeholder="phone" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="new_cat_name" class="col-sm-2 control-label">Categorie naam</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="new_cat_name" placeholder="Telefoons" value="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<input name="submitcat" type="submit" value="Send" class="btn btn-primary pull-left" id="send-butt">
								</div>
							</div>
						</form>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="panel panel-default">
		   		<div class="panel-heading">
		      		<h4 class="panel-title">
		        		<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Telefoon toevoegen</a>
		      		</h4>
		    	</div>
		    	<div id="collapse2" class="panel-collapse collapse">
		      		<div class="panel-body">
						<form class="form-horizontal" role="form" method="post" name="products">
							<div class="form-group">
								<label for="brand" class="col-sm-2 control-label">Merk</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="brand" placeholder="Apple" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="prod_name" class="col-sm-2 control-label">Naam</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="prod_name" placeholder="iPhone 5S" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="screen_size" class="col-sm-2 control-label">Schermgrootte</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="screen_size" placeholder="4 inch" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="resolution" class="col-sm-2 control-label">Resolutie</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="resolution" placeholder="640x1136" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="int_storage" class="col-sm-2 control-label">Interne opslag</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="int_storage" placeholder="16 GB" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="os" class="col-sm-2 control-label">Besturingssysteem</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="os" placeholder="iOS 7/8" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="camera" class="col-sm-2 control-label">Camera</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="camera" placeholder="8 megapixel" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="fr_camera" class="col-sm-2 control-label">Front-Camera</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="fr_camera" placeholder="1.2 megapixel" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="vid_resolution" class="col-sm-2 control-label">Videoresolutie</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="vid_resolution" placeholder="1920x1080 (Full HD)" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="stand_by" class="col-sm-2 control-label">Stand-by tijd</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="stand_by" placeholder="250 uur" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="4g" class="col-sm-2 control-label">4G</label>
								<div class="col-sm-10">
									<input type="radio" name="4g" value="Ja"> Ja
									<input type="radio" name="4g" value="Nee"> Nee
								</div>
							</div>
							<div class="form-group">
								<label for="bluetooth" class="col-sm-2 control-label">Bluetooth</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="bluetooth" placeholder="Bluetooth 4.0" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="img_path" class="col-sm-2 control-label">Image path</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="img_path" placeholder="iphone5s.png" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="full_specs" class="col-sm-2 control-label">Volledige Specificaties</label>
								<div class="col-sm-10">
									<textarea name="full_specs" class="form-control" style="height: 100px;"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="short_specs" class="col-sm-2 control-label">Korte Specificaties</label>
								<div class="col-sm-10">
									<textarea name="short_specs" class="form-control" style="height: 100px;"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="price" class="col-sm-2 control-label">Prijs</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="price" placeholder="299,-" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="sale" class="col-sm-2 control-label">Aanbieding</label>
								<div class="col-sm-10">
									<input type="radio" name="sale" value="Ja"> Ja
									<input type="radio" name="sale" value="Nee"> Nee
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<input name="submit" type="submit" value="Send" class="btn btn-primary pull-left" id="send-butt">
								</div>
							</div>
						</form>
		      		</div>
		    	</div>
		  	</div>
		  	<div class="panel panel-default">
		   		<div class="panel-heading">
		      		<h4 class="panel-title">
		        		<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Logo toevoegen</a>
		      		</h4>
		    	</div>
		    	<div id="collapse3" class="panel-collapse collapse">
		      		<div class="panel-body">
						<form class="form-horizontal" role="form" method="post" name="products">
							<div class="form-group">
								<label for="brand" class="col-sm-2 control-label">Merk</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="brand" placeholder="JMR Communication Services" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="prod_name" class="col-sm-2 control-label">Naam</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="prod_name" placeholder="Hipster Logo" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="kind" class="col-sm-2 control-label">Soort</label>
								<div class="col-sm-10">
									<input type="type" class="form-control" name="kind" placeholder="Abstract" value="">
								</div>
							</div>
							<div class="form-group">
								<label for="resolution" class="col-sm-2 control-label">Resolutie</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="resolution" placeholder="710x410" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="img_path" class="col-sm-2 control-label">Image path</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="img_path" placeholder="jmr-logo.png" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="full_specs" class="col-sm-2 control-label">Volledige Specificaties</label>
								<div class="col-sm-10">
									<textarea name="full_specs" class="form-control" style="height: 100px;"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="short_specs" class="col-sm-2 control-label">Korte Specificaties</label>
								<div class="col-sm-10">
									<textarea name="short_specs" class="form-control" style="height: 100px;"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="price" class="col-sm-2 control-label">Prijs</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="price" placeholder="120,-" value="" >
								</div>
							</div>
							<div class="form-group">
								<label for="sale" class="col-sm-2 control-label">Aanbieding</label>
								<div class="col-sm-10">
									<input type="radio" name="sale" value="Ja"> Ja
									<input type="radio" name="sale" value="Nee"> Nee
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<input name="submit-logo" type="submit" value="Send" class="btn btn-primary pull-left" id="send-butt">
								</div>
							</div>
						</form>
		      		</div>
		    	</div>
		  	</div>
		</div>
	</div>

<?php
include '../includes/footer.php';
?>

<!-- All Javascript at the bottom of the page for faster page loading -->
		
<!-- First try for the online version of jQuery-->
<script src="http://code.jquery.com/jquery.js"></script>
	
<!-- If no online access, fallback to our hardcoded version of jQuery -->
<script>window.jQuery || document.write('<script src="../../includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
<!-- Bootstrap JS -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
	
<!-- Custom JS -->
<script src="../../includes/js/script.js"></script>