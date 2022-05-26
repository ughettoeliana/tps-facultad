<?php
require __DIR__ . '/../library/products.php';
$product = getProductsById($_GET['id']);
?>

<section>
    <article class="product-container">
        <div>
            <h2><?= $product->title; ?></h2>
            <p><?= $product->short_description; ?></p>
            <p><?= $product->price; ?></p>
            <button class="button">Add to cart</button>
        </div>
        <picture class="products-item-image">
            <img src="./images/<?= $product->image;?>" alt="<?= $product->image_description;?>">
        </picture>
    </article>
</section>
