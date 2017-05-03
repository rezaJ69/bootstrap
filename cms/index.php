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
?>
<!DOCTYPE html>

<html>
	<?php 
	include 'includes/header.php';
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
				<a href="index.php?logout=true" role="button" class="btn btn-info" id="login-butt"><span class="glyphicon glyphicon-user"></span> Log out</a>
			</ul>
		</div>
	
		</div>
	</div>
	
	<?php
		$stmt = $pdo->prepare("SELECT fname FROM accounts WHERE id = ?");
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$result = $stmt->fetch();

		$fname = $result['fname'];
	?>

	<p style="margin-top: 150px;">Welkom <?= $fname; ?>!</p>

	<?php
		$stmt = $pdo->prepare("SELECT * FROM accounts WHERE id = ?");
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$result = $stmt->fetch();

		$rights = $result['rights'];
		$margin = 'margin-top: 115px;';

		if ($rights == 'admin') {
			$margin = '';

	?>

	<div class="row">
		<div class="col-sm-12">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">Admin</div>
				</div>

				<div class="row">
					<div class="col-sm-3">
						<div class="panel">
							<div class="panel-heading">
								<div class="panel-title">Rechten</div>
							</div>
							<a href="http://localhost/bootstrap/cms/accounts/index.php?action=rights" class="btn btn-info btn-block">Rechten toewijzen</a>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="panel">
							<div class="panel-heading">
								<div class="panel-title">Wachtwoord</div>
							</div>
							<a href="http://localhost/bootstrap/cms/accounts/index.php?action=password" class="btn btn-info btn-block">Wachtwoord veranderen</a>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>

	<?php
		}
	?>

	<div class="row">
		<div class="col-sm-3">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">Wachtwoord veranderen</div>
				</div>
				<p>Door op de knop hieronder te klikken kunt u uw wachtwoord op de website veranderen.</p>
				<a href="http://localhost/bootstrap/cms/index.php?action=password" class="btn btn-info btn-block">Wachtwoord veranderen</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">Producten Toevoegen</div>
				</div>
				<p>Door op de knop hieronder te klikken kunt u nieuwe producten toevoegen aan de website.</p>
				<a href="http://localhost/bootstrap/cms/products/index.php" class="btn btn-info btn-block">Producten toevoegen</a>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="panel">
				<div class="panel-heading">
					<div class="panel-title">Producten aanpassen</div>
				</div>
				<p>Door op de knop hieronder te klikken kunt u bestaande producten aanpassen.</p>
				<a href="http://localhost/bootstrap/cms/products/edit.php" class="btn btn-info btn-block">Producten aanpassen</a>
			</div>
		</div>
	</div>

	</div>

<?php
include 'includes/footer.php';
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