<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Product;

if (!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

// consulta o produto
$objProduct = Product::getProductById($_GET['id']);

// verificar se produto existe
if (!$objProduct instanceof Product) {
    header('location: index.php?status=error');
    exit;
}

// validação do post
if (isset($_POST['delete'])) {

    $objProduct->deleteProduct();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmdelete.php';
include __DIR__ . '/includes/footer.php';