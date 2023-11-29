<?php
require_once __DIR__ . '/../../bootstrap/autoload.php';

$id = $_POST['id'];

$product = (new Product)->getById($id);

if(!$product) {
	$_SESSION['error_message'] = "El product que querés delete al parecer no existe.";
	header("Location: ../index.php?s=product");
	exit;
}

try {

	$product->delete();

	if(!empty($product->getImage()) && file_exists(__DIR__ . '/../../images/' . $product->getImage())) {

		chmod(__DIR__ . '/../../images/' . $product->getImage(), 0755);

	}

	$_SESSION['success_message'] = "El product " . $product->getTitle() . " se eliminó con éxito.";
	header("Location: ../index.php?s=product");
	exit;
} catch (Exception $e) {
	$_SESSION['error_message'] = "¡Error! No pudiste delete el product.";
	header("Location: ../index.php?s=product");
	exit;
}

