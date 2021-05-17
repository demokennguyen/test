<?php

declare(strict_types=1);

use Core\Classes\Product;
use Core\Services\ShippingService;

require_once "bootstrap.php";

$shippingService = new ShippingService();
$product1 = new Product("Product 1", 200, 2.2, 2, 3, 0.1, ['fee_by_type' => 1]);
$product2 = new Product("Product 2", 140, 1.4, 2, 4, 0.1);

$shippingService->addProduct($product1);
$shippingService->addProduct($product2);
$grossPrice = $shippingService->calculate();

echo "Shipping products: $grossPrice";