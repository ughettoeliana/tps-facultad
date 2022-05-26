<?php
function allProducts(): array {
	$filename = __DIR__ . "/../data/products.json";
	$jsonContent = file_get_contents($filename);
	$data = json_decode($jsonContent, true);

	$exit = [];

	foreach($data as $valor) {
		$product = new Product;
		$product->product_id = $valor['product_id'];
		$product->image = $valor['image'];
		$product->image_description = $valor['image_description'];
		$product->title = $valor['title'];
		$product->short_description = $valor['short_description'];
		$product->price = $valor['price'];
	
		$exit[] = $product;
	}

	return $exit;
}

function getProductsById(int $id): ?Product {
	$products = allProducts();

	foreach($products as $product) {
		if($product->product_id == $id) {
			return $product;
		}
	}

	return null;
 }