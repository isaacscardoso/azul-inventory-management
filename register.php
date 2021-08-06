<?php

require __DIR__ . '/vendor/autoload.php';

const TITLE = 'Adicionar Produto';
const TITLE_BUTTON = 'Adicionar';

use App\Entity\Product;

$objProduct = new Product;

// validação do post
if (isset($_POST['name'], $_POST['price'], $_POST['stock'], $_POST['virtual'], $_POST['status'])) {

    $objProduct->name = $_POST['name'];
    $objProduct->price = $_POST['price'];
    $objProduct->stock = $_POST['stock'];
    $objProduct->sku = $_POST['sku'];
    $objProduct->virtual = $_POST['virtual'];
    $objProduct->status = $_POST['status'];

    $objProduct->addProduct();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form.php';
include __DIR__ . '/includes/footer.php';