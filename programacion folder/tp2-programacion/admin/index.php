<?php 
require_once __DIR__ . '/../bootstrap/autoload.php';

$rutas = [
    'product' => [
        'title' => 'Manage products',
    ],
    'newProduct' => [
        'title' => 'Add a new product',
    ],
    'editProduct' => [
        'title' => 'Edit a product',
    ],
    '404' => [
        'title' => 'The page was not found',
    ],
];

$page = $_GET['s'] ?? 'dashboard';

if(!isset($rutas[$page])) {
    $page = '404';
}

$rutaConfig = $rutas[$page];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $rutaConfig['title'] ?? '';?> :: Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css"/>
  </head>
  <body>
    <nav class="navbar">
      <ul class="nav-items">
        <li><a href="http://localhost/degregorio-federico_eliana-ughetto_tp2/index.php?s=home" class="nav-item">Home</a></li>
        <li><a href="http://localhost/degregorio-federico_eliana-ughetto_tp2/index.php?s=store" class="nav-item">Store</a></li>
        <li><a href="/degregorio-federico_eliana-ughetto_tp2/index.php?s=form" class="nav-item">Contact us</a></li>
        <li><a class="nav-item" href="index.php?s=product">Dashboard</a></li>
      </ul>
    </nav>
    <main>


    <?php
        $filename = __DIR__ . '/pages/' . $page . '.php';
        if(file_exists($filename)) {
            require $filename;
        }  else {
            require __DIR__ . '/pages/404.php';
        }
    ?> 
</main>
    <footer>
      <ul>
        <li>+11 57571094</li>
        <li>organicfood@gmail.com</li>
        <li>CABA</li>
      </ul>
    </footer>
  </body>
</html>


