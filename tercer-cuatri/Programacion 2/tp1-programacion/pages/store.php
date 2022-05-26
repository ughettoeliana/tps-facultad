<?php
require __DIR__ . '/../library/products.php';
$products = allProducts();
?>

<section class="banner-offers">
  <div class="img-banner-container">
    <img src="./images/banner-juice.png" alt="a bottle of orange juice">
  </div>
  <div class="banner-description">
    <h2>2X1 SALE</h2>
    <p>On the juice section buying 1 you take 2</p>
    <p class="red-text">With free delivery on the purchase</p>
  </div>
</section>
<div class="section-title">
  <h3>Food</h3>
  <a href="#" class="green-text">See all</a>
</div>


<section class="container-card">
  <div class="div-container">
    <?php
    foreach ($products as $product) :
    ?>
      <div class="card-item">
        <div class="img-container">
          <img src="./images/<?= $product->image; ?>" alt="<?= $product->image_description; ?>">
        </div>
        <h4><?= $product->title; ?></h4>
        <p><?= $product->price; ?></p>
        <a href="index.php?s=product-detail&id=<?= $product->product_id; ?>" class="green-text">See more</a>
      </div>
    <?php
    endforeach;
    ?>
  </div>
</section>