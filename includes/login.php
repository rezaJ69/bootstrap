<?php
if (isset($_POST['submit'])) {
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$mail 	  = $_POST['mail'];
		$username = $_POST['uname'];
		$password = $_POST['pword'];
		$repeat   = $_POST['repeat'];

		if ($password == $repeat) {
		
			$stmt = $pdo->prepare("INSERT INTO accounts (uname, pword, fname, lname, mail) VALUES (?, ?, ?, ?, ?)");
			$stmt->bindValue(1, $username);
			$stmt->bindValue(2, $password);
			$stmt->bindValue(3, $firstname);
			$stmt->bindValue(4, $lastname);
			$stmt->bindValue(5, $mail);
			$stmt->execute();

			$registration = 'complete';
			header('Location: http://localhost/bootstrap/index.php?registration='.$registration.'');
		}

		if ($password != $repeat) {

			$registration = 'failed';
			header('Location: http://localhost/bootstrap/index.php?registration='.$registration.'');
		}
	}


if (isset($_GET['registration'])) {
	$registration = $_GET['registration'];
}
else {
	$registration = '';
}

if (isset($_GET['login'])) {
	$login = $_GET['login'];
	if ($login = 'logout') {
		session_destroy();
	}
}
else {
	$login = '';
}

	if (isset($_POST['submit-log'])) {
		$username = $_POST['uname'];
		$password = $_POST['pword'];

		$stmt = $pdo->prepare("SELECT uname, pword, id FROM accounts WHERE uname = ?");
		$stmt->bindValue(1, $username);
		$stmt->execute();

		$result = $stmt->fetch();

		if ($result['pword'] == $password) {
			$id = $result['id'];
			$_SESSION['id'] = $id;
			header('Location: http://localhost/bootstrap/cms/index.php');
		} else {
			$login = 'failed';
			header('Location: http://localhost/bootstrap/index.php?login='.$login.'');
		}
	}
?>