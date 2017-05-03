<?php
$pdo = new PDO('mysql:host=localhost;dbname=bootstrap;charset=utf8', 'root', 'SF1960sf');

$id = $_GET['prodNum'];

$stmt = $pdo->prepare("SELECT id FROM products WHERE id = ?");
$stmt->bindValue(1, $id);
$stmt->execute();
$result = $stmt->fetch();

if ($result['id'] == $id) {
	$stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
	$stmt->bindValue(1, $id);
	$stmt->execute();

	header("Location: http://localhost/bootstrap/cms/products/edit.php?delete=complete");
} else {
	header("Location: http://localhost/bootstrap/cms/products/edit.php?delete=failed");
}
?>