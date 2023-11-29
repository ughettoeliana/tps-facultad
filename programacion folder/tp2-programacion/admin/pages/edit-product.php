<?php

$errores = $_SESSION['errores'] ?? [];
$dataForm = $_SESSION['data_form'] ?? [];

unset($_SESSION['errores'], $_SESSION['data_form']);

$product = (new product)->getById($_GET['id']);
?>
<section  class="container">
<h1 class="text-center" style="padding-top:3rem;">Edit product</h1>

	<form action="actions/edit-product.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="product_id" value="<?= $product->getProductId(); ?>">
		<div>
			<label for="title">Título</label>
			<input
				type="text"
				id="title"
				name="title"
				class="form-control"
				value="<?= $dataForm['title'] ?? $product->getTitle(); ?>"
				<?php if (isset($errores['title'])): ?> aria-describedby="error-title" <?php
endif; ?>
			>
			<?php
if (isset($errores['title'])):
?>
				<div><span>Error: </span><?= $errores['title']; ?></div>
			<?php
endif;
?>
		</div>
		<div>
			<label for="description">Descripción</label>
			<textarea
				id="description"
				name="description"
				class="form-control"
				<?php if (isset($errores['description'])): ?> aria-describedby="error-description" <?php
endif; ?>
			><?= $dataForm['description'] ?? $product->getDescription(); ?></textarea>
			<?php
if (isset($errores['description'])):
?>
				<div><span class="visually-hidden">Error: </span><?= $errores['description']; ?></div>
			<?php
endif;
?>
		</div>
		<div>
			<label for="price">Price</label>
			<textarea
				id="price"
				name="price"
				class="form-control"
				<?php if (isset($errores['price'])): ?> aria-describedby="error-price" <?php
endif; ?>
			><?= $dataForm['price'] ?? $product->getPrice(); ?></textarea>
			<?php
if (isset($errores['price'])):
?>
				<div><span>Error: </span><?= $errores['title']; ?></div>
			<?php
endif;
?>
		</div>
		<?php
if (!empty($product->getImage()) && file_exists(__DIR__ . '/../../imgs/' . $product->getImage())):
?>
		<div>
			<p>Imágen actual</p>
			<img src="<?='../imgs/' . $product->getImage(); ?>" alt="">
		</div>
		<?php
endif;
?>
		<div>
			<label for="image">Imágen</label>
			<input type="file" name="image" class="form-control">
		</div>
		<div>
			<label for="image_description">Descripción de la Image</label>
			<input
				type="text"
				id="image_description"
				name="image_description"
				class="form-control"
				value="<?= $dataForm['image_description'] ?? $product->getImageDescription(); ?>"
			>
		</div>
		<button type="submit" class="btn btn-primary">Actualizar</button>
	</form>
</section>