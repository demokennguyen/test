<?php

declare(strict_types=1);

namespace Core\Services;

use Core\Classes\Product;

class ShippingService
{
    private $products;

    /**
     * ShippingService constructor.
     * @param array $products
     */
    public function __construct($products = [])
    {
        $this->products = $products;
    }

    /**
     * Add product to list
     * @param $product
     */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }

    /**
     * Get list product
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * Calculate shipping price
     * @return float
     */
    public function calculate(): float
    {
        $grossPrice = 0;

        foreach ($this->products as $product) {
            $productService = (new ProductService($product));
            $grossPrice += $productService->getGrossPrice();
        }

        return $grossPrice;
    }
}