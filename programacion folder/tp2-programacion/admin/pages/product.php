<?php 
$products = (new Product)->allProducts();
?>
<section class="container">
	
	<h1 class="text-center" style="padding-top:3rem;">Manage products</h1>

	<table class="p-3 mb-2 bg-white text-dark table table-striped">
		<thead>
			<tr>
				<th>ID</th>
				<th>Product</th>
				<th>Description</th>
				<th>Image</th>
				<th>Price</th>
				<th class="opciones">Options</th>
			</tr>
		</thead>
		<tbody>
		<?php 
    foreach($products as $product):
    ?>
			<tr>
				<td><?= $product->getProductId();?></td>
				<td><?= $product->getTitle();?></td>
				<td><?= $product->getDescription();?></td>
				<td><img src="<?= '../images/' . $product->getImage();?>" alt="<?= $product->getImageDescription();?>"></td>
				<td><?= $product->getPrice();?></td>
				<td>
					<a class="btn btn-primary opciones" href="index.php?s=edit-product&id=<?= $product->getProductId();?>">Edit</a>
					<form action="actions/delete-product.php" method="post">
						<input type="hidden" name="id" value="<?= $product->getProductId();?>">
						<button type="submit" class="">Delete</button>
					</form>
				</td>
			</tr>
		<?php
		endforeach;
		?>
		</tbody>
	</table>
	<a class="btn btn-primary" href="index.php?s=new-product">Adda a new product</a>
</section>