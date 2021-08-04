<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Product;

$products = Product::getAllProducts();

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listing.php';
include __DIR__ . '/includes/footer.php';