<?php

require __DIR__ . '/vendor/autoload.php';

use App\Entity\Product;
use App\Database\Pagination;

// variável busca com filtro de entrada para evitar SQL Injection, tags html, javascript, etc.
$search = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);

// variável filtro (virtual / fisico) com filtro de entrada para evitar SQL Injection, tags html, javascript, etc.
$filter = filter_input(INPUT_GET, 'filter', FILTER_SANITIZE_STRING);
$filter = in_array($filter, ['Fisico', 'Virtual']) ? $filter : '';

// variável estado (publicado / pendente / rascunho) com filtro de entrada para evitar SQL Injection, tags html, javascript, etc.
$publicationStatus = filter_input(INPUT_GET, 'publicationStatus', FILTER_SANITIZE_STRING);
$publicationStatus = in_array($publicationStatus, ['Publicado', 'Pendente', 'Rascunho']) ? $publicationStatus : '';

// condições SQL para filtro de busca
$conditionsSQL = [
    strlen($search) ? 'nome LIKE "%' . str_replace(' ', '%', $search) . '%"' : null,
    strlen($filter) ? 'tipo = "' . $filter . '"' : null,
    strlen($publicationStatus) ? 'estado = "' . $publicationStatus . '"' : null
];

// remove posições vazias
$conditionsSQL = array_filter($conditionsSQL);

// clausula where
$where = implode(' AND ', $conditionsSQL);

// ~~

// quantidade total de produtos
$quantityProduct = Product::getQuantityProduct($where);

// paginação
$limitPerPage = 6;
$objPagination = new Pagination($quantityProduct, $_GET['pagina'] ?? 1, $limitPerPage);

// obtém todos os produtos ou produtos filtrados pelo where
$products = Product::getAllProducts($where, null, $objPagination->getLimit());

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/listing.php';
include __DIR__ . '/includes/footer.php';