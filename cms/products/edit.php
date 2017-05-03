<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=bootstrap;charset=utf8', 'root', 'SF1960sf');

if (isset($_GET['logout'])) {
	session_destroy();
	header('Location: http://localhost/bootstrap/index.php?login=logout');
}

if (isset($_SESSION['id'])) {
	$id = $_SESSION['id'];

	$stmt = $pdo->prepare("SELECT uname, pword, id FROM accounts WHERE id = ?");
	$stmt->bindValue(1, $id);
	$stmt->execute();
}
else {
	header('Location: http://www.google.com');
}

if (isset($_GET['prodNum'])) {
	$getid 	 	  = $_GET['prodNum'];
	$displayprods = "display: none;";

	$stmt = $pdo->prepare("SELECT type FROM products WHERE id = ?");
	$stmt->bindValue(1, $getid);
	$stmt->execute();
	$result = $stmt->fetch();

	if ($result['type'] == "phone") {
		$displaylogo = "display: none;";
		$diplayphone = "display: block;";

	} elseif ($result['type'] == "logo") {
		$displayphone = "display: none;";
		$displaylogo = "display: block;";
	}

} else {
	$displayphone = "display: none;";
	$displaylogo  = "display: none;";
	$displayprods = "display: block;";
	$getid		  = "";
}


if (isset($_POST['submit'])) {
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
	$price 		= $_POST['price'];
	$fullspecs 	= $_POST['full_specs'];
	$shortspecs = $_POST['short_specs'];
	$sale 		= $_POST['sale'];

	$stmt = $pdo->prepare("UPDATE products SET brand = ?, prod_name = ?, screen_size = ?, resolution = ?, int_storage = ?, os = ?, camera = ?, fr_camera = ?, vid_resolution = ?, stand_by = ?, 4g = ?, bluetooth = ?, img_path = ?, price = ?, full_specs = ?, short_specs = ?, sale = ? WHERE id = ?");
	$stmt->bindValue(1, $brand);
	$stmt->bindValue(2, $prodname);
	$stmt->bindValue(3, $screensize);
	$stmt->bindValue(4, $res);
	$stmt->bindValue(5, $storage);
	$stmt->bindValue(6, $os);
	$stmt->bindValue(7, $camera);
	$stmt->bindValue(8, $frcamera);
	$stmt->bindValue(9, $vidres);
	$stmt->bindValue(10, $standby);
	$stmt->bindValue(11, $fourg);
	$stmt->bindValue(12, $bluetooth);
	$stmt->bindValue(13, $imgpath);
	$stmt->bindValue(14, $price);
	$stmt->bindValue(15, $fullspecs);
	$stmt->bindValue(16, $shortspecs);
	$stmt->bindValue(17, $sale);
	$stmt->bindValue(18, $getid);
	$stmt->execute();
}

if (isset($_POST['submit-logo'])) {
	$brand 		= $_POST['brand'];
	$prodname 	= $_POST['prod_name'];
	$res 		= $_POST['resolution'];
	$imgpath 	= $_POST['img_path'];
	$price 		= $_POST['price'];
	$fullspecs 	= $_POST['full_specs'];
	$shortspecs = $_POST['short_specs'];
	$sale 		= $_POST['sale'];
	$kind 		= $_POST['kind'];

	$stmt = $pdo->prepare("UPDATE products SET brand = ?, prod_name = ?, resolution = ?, img_path = ?, price = ?, full_specs = ?, short_specs = ?, sale = ?, kind = ? WHERE id = ?");
	$stmt->bindValue(1, $brand);
	$stmt->bindValue(2, $prodname);
	$stmt->bindValue(3, $res);
	$stmt->bindValue(4, $imgpath);
	$stmt->bindValue(5, $price);
	$stmt->bindValue(6, $fullspecs);
	$stmt->bindValue(7, $shortspecs);
	$stmt->bindValue(8, $sale);
	$stmt->bindValue(9, $kind);
	$stmt->bindValue(10, $getid);
	$stmt->execute();
}

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
		<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		<!-- Custom CSS -->
		<link href="../../includes/css/styles.css" rel="stylesheet">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="../../includes/js/modernizr-2.6.2.min.js"></script>
		
		<link rel="shortcut icon" type="image/png" href="../../images/favicon.ico"/>
	</head>
	
	<div class="container" id="main">
		<div class="navbar navbar-fixed-top darker">
			<div class="container">
		
				<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
	
				<a class="navbar-brand" href="http://localhost/bootstrap/cms/"><img src="../../images/jmrlogoklein.png" style="height: 102.5px; width: 102.5px;" alt="JMR Logo" /></a>
		
				<div class="nav-collapse collapse navbar-responsive-collapse">

					<p class="logo-text">JMR Communication Service</p><br>
					<p class="logo-slogan text-muted">Wij zijn gespecialiseerd in web-development, reclame, logo's, computer training en app-development.</p>
			
					<ul class="nav navbar-nav pull-right">
						<a href="index.php?logout=true" role="button" class="btn btn-info" id="login-butt"><span class="glyphicon glyphicon-user"></span> Log out</a>
					</ul>
				</div>
	
			</div>
		</div>
		
		<?php
		if (isset($_GET['delete'])) {
			$delete = $_GET['delete'];
			$prodsmargin = "margin-top: 0px;";

			if ($delete == 'complete') {
				echo '<div class="alert alert-success fade in" style="display: block; margin-top: 160px;">
				<strong>Success!</strong><p>The product was deleted successfully!</p>
				</div>';
			}

			if ($delete == 'failed') {
				echo '<div class="alert alert-danger fade in" style="display: block; margin-top: 160px;">
				<strong>Oops!</strong><p>Something went wrong when deleting the product. Please try again or contact the developer!</p>
				</div>';
			}
		} else {
			$prodsmargin = "margin-top: 160px;";
		}
		?>
		<div class="row features" style="<?= $prodsmargin; ?> <?= $displayprods; ?>">

		<?php
			$stmt = $pdo->prepare("SELECT id, brand, prod_name, img_path, price, short_specs, sale FROM products");
			$stmt->execute();
			$result = $stmt->fetchAll();

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
				<div class="panel panel-size">
					<div class="panel-heading">
						<h3 class="panel-title panel-smaller"><?= $brand; ?> <?= $prodname; ?></h3>
					</div>
					<img src="../../images/<?= $imgpath; ?>" class="center-img" alt="<?= $brand; ?> <?= $prodname; ?>" id="gif" />
					<div class="label label-<?= $sale_bg; ?> price"><span class="glyphicon glyphicon-<?= $sale_icon; ?>"></span>&euro;<?= $price; ?></div>
			
					<p class="product-info"><?= htmlentities(substr($shortspecs,0,138)); ?><?php if (strlen($shortspecs) > 137) {echo "..";} ?></p>
					
					<a href="http://localhost/bootstrap/cms/products/edit.php?prodNum=<?= $id; ?>" target="_blank" class="btn btn-info btn-block">Aanpassen</a>
					<a href="http://localhost/bootstrap/cms/products/delete.php?prodNum=<?= $id; ?>" class="btn btn-danger btn-block">Verwijder</a>
				</div>
			</div>

		<?php
		}
		?>		
		</div>
				<?php
					$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
					$stmt->bindValue(1, $getid);
					$stmt->execute();
					$result = $stmt->fetch();

					$brand = $result['brand'];
					$prodname = $result['prod_name'];
					$screensize = $result['screen_size'];
					$res = $result['resolution'];
					$storage = $result['int_storage'];
					$os = $result['os'];
					$camera = $result['camera'];
					$frcamera = $result['fr_camera'];
					$vidres = $result['vid_resolution'];
					$standby = $result['stand_by'];
					$fourg = $result['4g'];
					$bluetooth = $result['bluetooth'];
					$imgpath = $result['img_path'];
					$price = $result['price'];
					$fullspecs = $result['full_specs'];
					$shortspecs = $result['short_specs'];
					$sale = $result['sale'];
					$kind = $result['kind'];
				?>
						<form class="form-horizontal" role="form" method="post" name="products" style="margin-top: 160px; <?= $displayphone; ?>">
							<div class="form-group">
								<label for="brand" class="col-sm-2 control-label">Merk</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="brand" value="<?= $brand; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="prod_name" class="col-sm-2 control-label">Naam</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="prod_name" value="<?= $prodname; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="screen_size" class="col-sm-2 control-label">Schermgrootte</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="screen_size" value="<?= $screensize; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="resolution" class="col-sm-2 control-label">Resolutie</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="resolution" value="<?= $res; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="int_storage" class="col-sm-2 control-label">Interne opslag</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="int_storage" value="<?= $storage; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="os" class="col-sm-2 control-label">Besturingssysteem</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="os" value="<?= $os; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="camera" class="col-sm-2 control-label">Camera</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="camera" value="<?= $camera; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="fr_camera" class="col-sm-2 control-label">Front-Camera</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="fr_camera" value="<?= $frcamera; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="vid_resolution" class="col-sm-2 control-label">Videoresolutie</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="vid_resolution" value="<?= $vidres; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="stand_by" class="col-sm-2 control-label">Stand-by tijd</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="stand_by" value="<?= $standby; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="4g" class="col-sm-2 control-label">4G</label>
								<div class="col-sm-10">

								<?php
								if ($fourg == "Ja") {
									$fourgy = "checked";
									$fourgn = "";
								} else {
									$fourgy = "";
									$fourgn = "checked";
								}

								?>

									<input type="radio" name="4g" value="Ja" <?= $fourgy; ?>> Ja
									<input type="radio" name="4g" value="Nee" <?= $fourgn; ?>> Nee
								</div>
							</div>
							<div class="form-group">
								<label for="bluetooth" class="col-sm-2 control-label">Bluetooth</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="bluetooth" value="<?= $bluetooth; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="img_path" class="col-sm-2 control-label">Image path</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="img_path" value="<?= $imgpath; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="full_specs" class="col-sm-2 control-label">Volledige Specificaties</label>
								<div class="col-sm-10">
									<textarea name="full_specs" class="form-control" style="height: 100px;"><?= $fullspecs; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="short_specs" class="col-sm-2 control-label">Korte Specificaties</label>
								<div class="col-sm-10">
									<textarea name="short_specs" class="form-control" style="height: 100px;"><?= $shortspecs; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="price" class="col-sm-2 control-label">Prijs</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="price" value="<?= $price; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="sale" class="col-sm-2 control-label">Aanbieding</label>
								<div class="col-sm-10">

								<?php
								if ($sale == "Ja") {
									$saley = "checked";
									$salen = "";
								} else {
									$saley = "";
									$salen = "checked";
								}
								?>

									<input type="radio" name="sale" value="Ja" <?= $saley; ?>> Ja
									<input type="radio" name="sale" value="Nee" <?= $salen; ?>> Nee
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<input name="submit" type="submit" value="Update" class="btn btn-primary pull-left" id="send-butt">
								</div>
							</div>
						</form>
		  	
						<form class="form-horizontal" role="form" method="post" name="products" style="margin-top: 160px; <?= $displaylogo; ?>">
							<div class="form-group">
								<label for="brand" class="col-sm-2 control-label">Merk</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="brand" value="<?= $brand; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="prod_name" class="col-sm-2 control-label">Naam</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="prod_name" value="<?= $prodname; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="kind" class="col-sm-2 control-label">Soort</label>
								<div class="col-sm-10">
									<input type="type" class="form-control" name="kind" value="<?= $kind; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="resolution" class="col-sm-2 control-label">Resolutie</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="resolution" value="<?= $res; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="img_path" class="col-sm-2 control-label">Image path</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="img_path" value="<?= $imgpath; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="full_specs" class="col-sm-2 control-label">Volledige Specificaties</label>
								<div class="col-sm-10">
									<textarea name="full_specs" class="form-control" style="height: 100px;"><?= $fullspecs; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="short_specs" class="col-sm-2 control-label">Korte Specificaties</label>
								<div class="col-sm-10">
									<textarea name="short_specs" class="form-control" style="height: 100px;"><?= $shortspecs; ?></textarea>
								</div>
							</div>
							<div class="form-group">
								<label for="price" class="col-sm-2 control-label">Prijs</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="price" value="<?= $price; ?>" >
								</div>
							</div>
							<div class="form-group">
								<label for="sale" class="col-sm-2 control-label">Aanbieding</label>
								<div class="col-sm-10">

								<?php
								if ($sale == "Ja") {
									$saley = "checked";
									$salen = "";
								} else {
									$saley = "";
									$salen = "checked";
								}
								?>

									<input type="radio" name="sale" value="Ja" <?= $saley; ?>> Ja
									<input type="radio" name="sale" value="Nee" <?= $salen ?>> Nee
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-10 col-sm-offset-2">
									<input name="submit-logo" type="submit" value="Update" class="btn btn-primary pull-left" id="send-butt">
								</div>
							</div>
						</form>
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