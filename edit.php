<?php

require __DIR__ . '/vendor/autoload.php';

const TITLE = 'Editar Produto';
const TITLE_BUTTON = 'Editar';

use App\Entity\Product;

// validação do ID
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
if (isset($_POST['name'], $_POST['sku'], $_POST['virtual'], $_POST['productPublicationStatus'], $_POST['price'], $_POST['stock'])) {

    $objProduct->name = $_POST['name'];
    $objProduct->sku = $_POST['sku'];
    $objProduct->virtual = $_POST['virtual'];
    $objProduct->productPublicationStatus = $_POST['productPublicationStatus'];
    $objProduct->price = $_POST['price'];
    $objProduct->stock = $_POST['stock'];

    $objProduct->updateProduct();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/edit.php';
include __DIR__ . '/includes/footer.php';