<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';

$product_id		= $_POST['product_id'];
$title				= $_POST['title'];
$description 		= $_POST['description'];
$price 			= $_POST['price'];
$image_description	= $_POST['image_description'];
$image 			= $_FILES['image']; 

$product = (new product)->getById($product_id);

if(!$product) {
	$_SESSION['error_message'] = "The product that you are trying to edit it doesn't exists";
	header("Location: ../index.php?s=product");
	exit;
}

$validador = new ValidateProduct([
	'title' => $title,
	'description' => $description,
	'price' => $price,
	'image' => $image,
	'image_description' => $image_description,
]);

if($validador->hayErrores()) {

	$_SESSION['errores'] = $validador->getErrores();
	$_SESSION['data_form'] = $_POST;

	header("Location: ../index.php?s=edit-product&id=" . $product_id);
	exit;
}

if(!empty($image['tmp_name'])) {

	$nombreImage = date('YmdHis_') . $image['name'];

	move_uploaded_file($image['tmp_name'], __DIR__ . '/../../images/' . $nombreImage);
}

try {
	(new Product)->edit($product_id, [
		'title' => $title,
		'description' => $description,
		'price' => $price,
		'image' => $nombreImage ?? $product->getImage(),
		'image_description' => $image_description,
	]);

	$_SESSION['success_message'] = "a " . $title . " se actualizó correctamente.";

	header("Location: ../index.php?s=product");

	exit;
} catch (Exception $e) {

	$_SESSION['error_message'] = "¡Error al actualizar el product! Intentá mas tarde.";
	$_SESSION['data_form'] = $_POST;

	header("Location: ../index.php?s=edit-product&id=" . $product_id);
	exit;
}