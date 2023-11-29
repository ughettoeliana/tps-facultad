<?php

require_once __DIR__ . '/../../bootstrap/autoload.php';

$title				= $_POST['title'];
$description 		= $_POST['description'];
$price 			= $_POST['price'];
$image_description	= $_POST['image_description'];
$image 			= $_FILES['image'];

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

	header("Location: ../index.php?s=new-product");
	exit;
}


if(!empty($image['tmp_name'])) {

	$nombreImage = date('YmdHis_') . $image['name'];

	move_uploaded_file($image['tmp_name'], __DIR__ . '/../../images/' . $nombreImage);
}

try {
	(new Product)->crear([
		'title' => $title,
		'description' => $description,
		'price' => $price,
		'image' => $nombreImage ?? null,
		'image_description' => $image_description,
	]);

	$_SESSION['success_message'] = "" . $title . "se creó exitosamente.";

	header("Location: ../index.php?s=product");

	exit;
} catch (Exception $e) {

	$_SESSION['error_message'] = "Error inesperado al crear el product. Por favor, probá de nuevo más tarde.";
	$_SESSION['data_form'] = $_POST;

	header("Location: ../index.php?s=new-product");
	exit;
}