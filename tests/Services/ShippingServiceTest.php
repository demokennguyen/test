<?php

namespace Tests\Services;

use Core\Classes\Product;
use Core\Services\ShippingService;
use PHPUnit\Framework\TestCase;

final class ShippingServiceTest extends TestCase
{
    public function testCanAddProduct()
    {
        $shippingService = new ShippingService();
        $product1 = new Product("Product 1", 200, 2.2, 2, 3, 0.1);
        $product2 = new Product("Product 2", 140, 1.4, 2, 4, 0.1);

        $shippingService->addProduct($product1);
        $shippingService->addProduct($product2);

        $this->assertCount(
            2,
            $shippingService->getProducts()
        );
    }

    public function calculateShippingDataProvider(): array
    {
        return [
            [
                [
                    new Product("Product 1", 200, 2.2, 2, 3, 0.1),
                ],
                224.2
            ],
            [
                [
                    new Product("Product 1", 200, 2.2, 2, 3, 0.1, ['fee_by_type' => 40]),
                ],
                240.0
            ],
            [
                [
                    new Product("Product 1", 200, 2.2, 2, 3, 0.1),
                    new Product("Product 2", 140, 1.4, 2, 4, 0.1)
                ],
                379.6
            ]
        ];
    }

    /**
     * @dataProvider calculateShippingDataProvider
     * @param $products
     * @param $shippingFeeExpected
     */
    public function testCalculateShipping($products, $shippingFeeExpected)
    {
        $shippingService = new ShippingService();
        foreach ($products as $product) {
            $shippingService->addProduct($product);
        }

        $this->assertEquals($shippingFeeExpected, $shippingService->calculate());
    }
}