<?php declare(strict_types=1);

use App\Classes\MySqlQueryBuilder;
use App\Classes\Product;

require_once __DIR__ . '/vendor/autoload.php';

echo (new Product(
    new MySqlQueryBuilder()
))->getProducts();