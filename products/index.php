<?php
if (isset($_GET['type'])) {
	$gettype = $_GET['type'];
}

if (isset($_GET['sale'])) {
	$getsale = $_GET['sale'];
}

if (isset($_GET['os'])) {
	$getos = $_GET['os'];
}

if (isset($_GET['brand'])) {
	$getbrand = $_GET['brand'];
}

if (isset($_GET['kind'])) {
	$getkind = $_GET['kind'];
}


session_start();
$pdo = new PDO('mysql:host=localhost;dbname=bootstrap;charset=utf8', 'root', 'SF1960sf');

include '../includes/login.php';
?>
<!DOCTYPE html>

<html>
	<?php 
	include '../includes/header.php';
	?>
<body>
	
	<div class="container" id="main">
		<div class="navbar navbar-fixed-top darker">
	<div class="container">
		
		<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	
		<a class="navbar-brand" href="http://localhost/bootstrap/"><img src="../images/jmrlogoklein.png" style="height: 102.5px; width: 102.5px;" alt="JMR Logo" /></a>
		
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

	<div class="row features" style="margin-top: 225px;">
	<?php
	if (isset($getbrand)) {
		$stmt = $pdo->prepare("SELECT id, brand, prod_name, img_path, price, short_specs, sale FROM products WHERE brand = ? AND type = ?");
		$stmt->bindValue(1, $getbrand);
		$stmt->bindValue(2, $gettype);
	} elseif (isset($getos)) {
		$stmt = $pdo->prepare("SELECT id, brand, prod_name, img_path, price, short_specs, sale FROM products WHERE os LIKE 'Android%' AND type = ?");
		$stmt->bindValue(1, $gettype);
	} elseif (isset($getsale)) {
		$stmt = $pdo->prepare("SELECT id, brand, prod_name, img_path, price, short_specs, sale FROM products WHERE sale = ?");
		$stmt->bindValue(1, $getsale);
	} elseif (isset($getkind)) {
		$stmt =$pdo->prepare("SELECT id, brand, prod_name, img_path, price, short_specs, sale FROM products WHERE kind = ?");
		$stmt->bindValue(1, $getkind);
	} elseif (isset($gettype)) {
		$stmt = $pdo->prepare("SELECT id, brand, prod_name, img_path, price, short_specs, sale FROM products WHERE type = ?");
		$stmt->bindValue(1, $gettype);
	}

	$stmt->execute();
	$result = $stmt->fetchAll();

	if ($stmt->rowCount() == 0) {
	?>
	<div class="alert alert-danger fade in" style="display: block;">
		<strong>Empty!</strong><p>There are no products on this page, maybe check back at a later time.</p>
	</div>
	<?php
	}

	foreach ($result as $row) {
		$id 		= $row['id'];
		$brand 		= $row['brand'];
		$prodname 	= $row['prod_name'];
		$imgpath 	= $row['img_path'];
		$price 		= $row['price'];
		$shortspecs = $row['short_specs'];
		$sale 		= $row['sale'];

		if ($sale == "Ja") {
			$sale_icon = "fire";
			$sale_bg   = "danger";
		} else {
			$sale_icon = "tag";
			$sale_bg   = "success";
		}
	?>

	<div class="col-sm-3 feature">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title panel-smaller"><?= $brand; ?> <?= $prodname; ?></h3>
			</div>
			<img src="../images/<?= $imgpath; ?>" class="center-img" alt="<?= $brand; ?> <?= $prodname; ?>" id="gif" />
			<div class="label label-<?= $sale_bg; ?> price"><span class="glyphicon glyphicon-<?= $sale_icon; ?>"></span>&euro;<?= $price; ?></div>
			
			<p class="product-info"><?= htmlentities(substr($shortspecs,0,138)); ?><?php if (strlen($shortspecs) > 137) {echo "..";} ?></p>

			<a href="http://localhost/bootstrap/detail/index.php?type=<?= $gettype; ?>&prodNum=<?= $id; ?>" target="_blank" class="btn btn-info btn-block">Details</a>
		</div>
	</div>
	<?php
	}
	?>
</div>

</div>

<?php
include '../includes/footer.php';
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
	<script>window.jQuery || document.write('<script src="../includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="../includes/js/script.js"></script>
	
	</body>
</html>