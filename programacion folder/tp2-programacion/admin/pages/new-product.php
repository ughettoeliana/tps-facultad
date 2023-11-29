<?php 

$errores = $_SESSION['errores'] ?? [];
$dataForm = $_SESSION['data_form'] ?? [];


unset($_SESSION['errores'], $_SESSION['data_form']);
?>
<section class="container">
	<h1 class="text-center" style="padding-top:3rem;">Publica un nuevo product</h1>

	<form action="actions/products-crear.php" method="post" enctype="multipart/form-data">
		<div>
			<label for="title">Título</label>

			<input
				type="text"
				id="title"
				name="title"
				class="form-control"
				value="<?= $dataForm['title'] ?? null;?>"
				<?php if(isset($errores['title'])): ?> aria-describedby="error-title" <?php endif;?>
			>
			<?php 
			if(isset($errores['title'])):
			?>
				<div><span class="visually-hidden">Error: </span><?= $errores['title'];?></div>
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
				<?php if(isset($errores['description'])): ?> aria-describedby="error-description" <?php endif;?>
			><?= $dataForm['description'] ?? null;?></textarea>
			<?php 
			if(isset($errores['description'])):
			?>
				<div><span class="visually-hidden">Error: </span><?= $errores['description'];?></div>
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
				<?php if(isset($errores['price'])): ?> aria-describedby="error-price" <?php endif;?>
			><?= $dataForm['price'] ?? null;?></textarea>
			<?php 
			if(isset($errores['price'])):
			?>
				<div><span class="visually-hidden">Error: </span><?= $errores['title'];?></div>
			<?php 
			endif;
			?>
		</div>
		<div>
			<label for="image">Image</label>
			<input type="file" id="image" name="image" class="form-control">
		</div>
		<div>
			<label for="image_description">Descripción de la Image</label>
			<input
				type="text"
				id="image_description"
				name="image_description"
				class="form-control"
				value="<?= $dataForm['image_description'] ?? null;?>"
			>
		</div>
		<button type="submit" class="btn btn-primary">Publicar</button>
	</form>
</section>