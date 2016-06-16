<?php
namespace ShopInfra\Activity;
use Shop\Activity\Cart as AbstractCart;
use Qiscus\Entity\User;
use Qiscus\Entity\Product;
use Qiscus\Repository\Product as ProductRepo;
class Cart extends AbstractDashboard
{
    public function addProduct(ProductRepo $productRepo, Product $product)
    {
        $productRepo->create($room); 
    }
    public function deleteProduct(ProductRepo $productRepo, $id)
    {
        $productRepo->destroy($id);
    } 
}