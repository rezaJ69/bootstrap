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
	
				<a class="navbar-brand" href="http://localhost/bootstrap/"><img src="../../images/jmrlogoklein.png" style="height: 102.5px; width: 102.5px;" alt="JMR Logo" /></a>
		
				<div class="nav-collapse collapse navbar-responsive-collapse">

					<p class="logo-text">JMR Communication Service</p><br>
					<p class="logo-slogan text-muted">Wij zijn gespecialiseerd in web-development, reclame, logo's, computer training en app-development.</p>
			
					<ul class="nav navbar-nav pull-right">
						<a href="index.php?logout=true" role="button" class="btn btn-info" id="login-butt"><span class="glyphicon glyphicon-user"></span> Log out</a>
					</ul>
				</div>
	
			</div>
		</div>
	</div>