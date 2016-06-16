<?php
namespace Shop\Activity;
use Shop\Entity\User;
use Shop\Entity\Product as ProductEntity;
use Shop\Repository\Product as ProductRepo;
abstract class Cart
{
    protected $user;
    /**
     * Cart only constructed
     * with user entity object
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * User can add more product
     */
    abstract public function addProduct(ProductRepo $productRepo, ProductEntity $product);
    /**
     * User can delete it
     */
    abstract public function deleteProduct(ProductRepo $productRepo, $id);
}