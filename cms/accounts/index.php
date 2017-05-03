<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=bootstrap;charset=utf8', 'root', 'SF1960sf');

if (isset($_POST['rights'])) {
	$stmt = $pdo->prepare("UPDATE uname, fname, lname, mail")
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

		<div class="panel" style="margin-top: 160px;">
			<div class="panel-heading">
				<div class="panel-title">
					<p>Accounts aanpassen</p>
				</div>
			</div>
					<?php
						$stmt = $pdo->prepare("SELECT * FROM accounts");
						$stmt->execute();
						$result = $stmt->fetchAll();

						$num    = 0;

						foreach ($result as $row) {
							$uname  = $row['uname'];
							$fname  = $row['fname'];
							$lname  = $row['lname'];
							$mail   = $row['mail'];
							$rights = $row['rights'];
							$num++;	
					?>

		<div class="panel-group account-accordion" id="accordion">
		  	<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
					    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $num; ?>"><?= $uname; ?></a>
					</h4>
				</div>
				<div id="collapse<?= $num; ?>" class="panel-collapse collapse">
					<div class="panel-body">
						<form class="form-horizontal" role="form" method="post" name="accounts">
							<div class="form-group">
								<label for="uname" class="col-sm-2 control-label">Gebruikersnaam</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="uname" placeholder="" value="<?= $uname; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="fname" class="col-sm-2 control-label">Voornaam</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="fname" placeholder="" value="<?= $fname; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="lname" class="col-sm-2 control-label">Achternaam</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="lname" placeholder="" value="<?= $lname; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="mail" class="col-sm-2 control-label">Mailadres</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="mail" placeholder="" value="<?= $mail; ?>">
								</div>
							</div>
							<div class="form-group">
								<label for="rights" class="col-sm-2 control-label">Rechten</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="rights" placeholder="" value="<?= $rights; ?>">
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
			</div>
			
			<?php
			}
			?>

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