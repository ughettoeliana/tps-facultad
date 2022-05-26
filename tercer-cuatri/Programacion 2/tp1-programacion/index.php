<?php 

require_once __DIR__ . '/bootstrap/autoload.php';


$rutas = [
    'home' => [
        'title' => 'Principal page',
    ],
    'store' => [
        'title' => 'Store',
    ],
    'product-detail' => [
        'title' => 'Product Details',
    ],
    'form' => [
        'title' => 'Contact us',
    ],
    '404' => [
        'title' => 'Page not found',
    ],
];

$page = $_GET['s'] ?? 'home';

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
    <title><?= $rutaConfig['title'] ?></title>

    <link rel="stylesheet" href="css/style.css"/>
  </head>
  <body>
    <nav class="navbar">
      <div class="burger"></div>
      <ul class="nav-items">
        <li><a href="index.php?s=home" class="nav-item">Home</a></li>
        <li><a href="index.php?s=store" class="nav-item">Store</a></li>
        <li><a href="index.php?s=form" class="nav-item">About us</a></li>
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
