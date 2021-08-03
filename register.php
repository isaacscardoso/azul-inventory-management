<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Product;

// validação do post
if (isset($_POST['name'], $_POST['price'], $_POST['stock'])) {
    $objProduct = new Product();

    $objProduct->name = $_POST['name'];
    $objProduct->price = $_POST['price'];
    $objProduct->stock = $_POST['stock'];
    $objProduct->sku = $_POST['sku'];

    $objProduct->addProduct();
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form.php';
include __DIR__ . '/includes/footer.php';