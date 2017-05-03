<?php
if (isset($_GET['type'])) {
	$gettype = $_GET['type'];
}

$id = $_GET['prodNum'];
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=bootstrap;charset=utf8', 'root', 'SF1960sf');

$stmt = $pdo->query("SELECT * FROM products WHERE id = $id");
$result = $stmt->fetch();

$brand 		= $result['brand'];
$prodname 	= $result['prod_name'];
$screensize = $result['screen_size'];
$res 		= $result['resolution'];
$storage 	= $result['int_storage'];
$os 		= $result['os'];
$camera 	= $result['camera'];
$frcamera 	= $result['fr_camera'];	
$vidres 	= $result['vid_resolution'];
$standby 	= $result['stand_by'];
$fourg 		= $result['4g'];
$bluetooth 	= $result['bluetooth'];
$imgpath 	= $result['img_path'];
$fullspecs  = $result['full_specs'];
$price		= $result['price'];
$sale		= $result['sale'];

if ($fourg == "Ja") {
	$fourg_icon = "ok";
} else {
	$fourg_icon = "remove";
}

if ($sale == "Ja") {
	$salecolor = "danger";
	$salelogo  = "fire";
} else {
	$salecolor = "success";
	$salelogo  = "tag";
}

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

<div class="row detail" style="margin-top: 216px;">
	<div class="col-sm-2">
		<div class="panel-heading fchild">
			<h3 class="panel-title">Filters</h3>
		</div>
		<div class="panel panel-radius panel-filter">
            <div class="form">
            	<div class="panel-heading">
               		<label for="brand" class="control-label">Merk</label>
                </div>
                <?php
                $stmt = $pdo->prepare("SELECT DISTINCT brand FROM products WHERE type = ?");
                $stmt->bindValue(1, $gettype);
                $stmt->execute();
				$result = $stmt->fetchAll();

				foreach ($result as $row) {
					$filter_brand = $row['brand'];
                ?>
                	<div class="filter-brand-style">
                		<a href="http://localhost/bootstrap/products/index.php?type=<?= $gettype; ?>&brand=<?= $filter_brand; ?>"><?= $filter_brand; ?></a>
                	</div>
                <?php
                }
                ?>
            </div>
        </div>
	</div>
	<div class="col-sm-6">
		<div class="panel-heading">
			<h3 class="panel-title"><?= $brand; ?> <?= $prodname; ?></h3>
		</div>
		<div class="img-container">
			<div class="label label-<?= $salecolor; ?> price"><span class="glyphicon glyphicon-<?= $salelogo; ?>"></span>&euro;<?= $price ?></div>
			<img src="../images/<?= $imgpath; ?>" class="detail-img" />
		</div>
	</div>
	<div class="col-sm-4" id="col-extra">
		<div class="panel-heading lchild panel-heading-extra">
			<div class="panel-title">Specs short</div>
		</div>
		<div class="panel panel-short-specs" id="panel-extra">
			
			<?php
				if (isset($id)) {
					$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
					$stmt->bindValue(1, $id);
					$stmt->execute();
					$result = $stmt->fetchAll();

					foreach ($result as $row) {
						$type		= $row['type'];

						if ($type == "phone") {
							$screensize = $row['screen_size'];
							$res 		= $row['resolution'];
							$storage 	= $row['int_storage'];
							$os 		= $row['os'];
							$camera 	= $row['camera'];
							$frcamera 	= $row['fr_camera'];
							$vidres 	= $row['vid_resolution'];
							$standby 	= $row['stand_by'];
							$fourg 		= $row['4g'];
							$bluetooth 	= $row['bluetooth'];
							$fullspecs 	= $row['full_specs'];
							$shortspecs = $row['short_specs'];
			?>
							<div class="specs">
								<p class="spec-first">Schermgrootte</p> <p class="specs-short"><?= $screensize; ?></p>
							</div>
							<hr />
							<div class="specs">
								<p class="spec-first">Resolutie</p> <p class="specs-short"><?= $res; ?></p>
							<hr />
							<div class="specs">
								<p class="spec-first">Interne opslag</p> <p class="specs-short"><?= $storage; ?></p>
							</div>
							<hr />
							<div class="specs">
								<p class="spec-first">Besturingssysteem</p> <p class="specs-short"><?= $os; ?></p>
							</div>
							<hr />
							<div class="specs">
								<p class="spec-first">Camera</p> <p class="specs-short"><?= $camera; ?></p>
							</div>
							<hr />
							<div class="specs">
								<p class="spec-first">Front-Camera</p> <p class="specs-short"><?= $frcamera; ?></p>
							</div>
							<hr />
							<div class="specs">
								<p class="spec-first">Videoresolutie</p> <p class="specs-short"><?= $vidres; ?></p>
							</div>
							<hr />
							<div class="specs">
								<p class="spec-first">Stand-by tijd</p> <p class="specs-short"><?= $standby; ?></p>
							</div>
							<hr />
							<div class="specs">
								<p class="spec-first">4G (lte)</p> <p class="specs-short"><span class="glyphicon glyphicon-<?= $fourg_icon; ?>" id="glyph-yes"></span> <?= $fourg; ?></p>
							</div>
							<hr />
							<div class="specs">
								<p class="spec-first">Bluetooth</p> <p class="specs-short"><?= $bluetooth; ?></p>
							</div>
			<?php
						}
						if ($type == "logo") {
							$res		= $row['resolution'];
							$fullspecs 	= $row['full_specs'];
							$shortspecs = $row['short_specs'];
							$kind 		= $row['kind'];
			?>
							<div class="specs">
								<p class="spec-first">Resolutie</p> <p class="specs-short"><?= $res; ?></p>
							</div>
							<hr />
							<div class="specs">
								<p class="spec-first">Soort</p> <p class="specs-short"><?= $kind; ?></p>
							</div>
			<?php
						}
					}
				}
			?>
		</div>
	</div>

</div>
<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-spec panel-radius">
				<div class="panel-heading">
					<div class="panel-title">
						Specificaties
					</div>
				</div>
				<p class="specs-all"><?= $fullspecs; ?></p>
			</div>
		</div>
	</div>
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