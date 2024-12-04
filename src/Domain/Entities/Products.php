<?php

namespace KostasChasiotis\OctoTravel\Domain\Entities;

/**
 * A type-safe container for managing an array of Product instances.
 * 
 * This class enforces type safety by ensuring only `Product` instances
 * can be added to the array. It provides methods for managing and retrieving the
 * stored formats and their respective values.
 */
class Products
{
    /**
     * @var Product[] A list of Product instances.
     */
    private array $products;

    /**
     * Constructor to initialize the Products collection.
     * 
     * Accepts a variable number of `Product` instances and stores them
     * in the container.
     * 
     * @param Product ...$products One or more Product instances.
     */
    public function __construct(Product ...$products)
    {
        $this->products = $products;
    }

    /**
     * Retrieves all Product instances stored in the collection.
     *
     * @return Product[] An array of Products instances.
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * Adds a new Product instance to the collection.
     * 
     * This method appends the provided Product instance to the existing
     * list of formats.
     * 
     * @param Product $product The Product instance to add.
     * @return void
     */
    public function add(Product $product): void
    {
        $this->products[] = $product;
    }

    /**
     * Return the Products as an array
     * 
     * @return array
     */
    public function toArray(): array
    {
        return array_map(
            fn(Product $product) => $product->toArray(),
            $this->products
        );
    }
}
