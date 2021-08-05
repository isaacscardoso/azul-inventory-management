<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Product;

// variável busca com filtro de entrada para evitar SQL Injection, tags html, javascript, etc.
$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);

// condições SQL para filtro de busca por nome
$conditionsSQL = [
    strlen($search) ? 'nome LIKE "%' . str_replace(' ', '%', $search) . '%"' : null
];

// clausula where
$where = implode(' AND ', $conditionsSQL);

// obtém todos os produtos ou produtos filtrados pelo where
$products = Product::getAllProducts($where);

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listing.php';
include __DIR__ . '/includes/footer.php';