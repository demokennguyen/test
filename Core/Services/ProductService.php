<?php

declare(strict_types=1);

namespace Core\Services;

class ProductService
{
    private $product;
    private $coefficients;

    public function __construct($product)
    {
        $this->product = $product;
        $this->coefficients = [
            'weight' => $_ENV['COEFFICIENTS_WEIGHT'] ?? 0,
            'dimension' => $_ENV['COEFFICIENTS_DIMENSION'] ?? 0,
        ];
    }

    /**
     * Get gross price
     * @return float
     */
    public function getGrossPrice(): float
    {
        return $this->product->price + $this->getProductShippingFee();
    }

    /**
     * Get shipping fee
     * @return float
     */
    private function getProductShippingFee(): float
    {
        return max($this->getFeeByDimension(), $this->getFeeByWeight(), $this->getExtraFee());
    }

    /**
     * Get fee by dimension
     * @return float
     */
    protected function getFeeByDimension(): float
    {
        return $this->product->width *
            $this->product->height *
            $this->product->depth *
            $this->coefficients['dimension'];
    }

    /**
     * Get fee by weight
     * @return float
     */
    protected function getFeeByWeight(): float
    {
        return $this->product->weight * $this->coefficients['weight'];
    }

    /**
     * Get extra fee
     * @return float
     */
    protected function getExtraFee(): float
    {
        $extraFee = 0;
        foreach ($this->product->extraFee as $fee) {
            $extraFee += $fee;
        }

        return $extraFee;
    }
}