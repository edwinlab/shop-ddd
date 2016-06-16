<?php
namespace ShopCore\Activity;
use ShopInfra\Activity\Dashboard;
use ShopInfra\Repository\Product as ProductRepo;
use Shop\Entity\User;
use Shop\Entity\Product as ProductEntity;
/**
 * This test class act as Application layer.
 * We can manage our implemented code in the Infrastructure
 * layer in here.
 */
class CartTest extends \PHPUnit_Framework_TestCase
{
    private $Cart;
    private $ProductRepo;
    /**
     * Call and build object from infrastructure
     */
    public function setUp()
    {
        $user = new User;
        $this->Cart = new Cart($user);
        $this->ProductRepo = new ProductRepo;
    }
    public function testAddProduct()
    {
        $product = $this->__setUpProductEntity();
        /*
         * user try to add product
         * save to datasource
         */
        $this->Cart->addProduct($this->ProductRepo, $product);
        /*
         * what we expect ?
         * when we try to read from datasource (InMemory)
         * it should give a response a same object with $product
         */
        $getProduct = $this->ProductRepo->read($product->id);
        $this->assertNotEmpty($getProduct);
        $this->assertEquals("test product 1", $getProduct->name);
    }
    public function testDeleteProduct()
    {
        $product = $this->__setUpProductEntity();
        /*
         * user try to add product
         * save to datasource
         */
        $this->Cart->addProduct($this->ProductRepo, $product);
        /*
         * and suddenly, User forgot about something
         * then he/she decide to remove a product he has
         * been created just now
         */
        $this->Cart->deleteProduct($this->ProductRepo, $product->id);
        /*
         * what we expect?
         * User has been delete the product he/she just created
         * when we try to fetch that product from datasource
         * it should not exists anymore
         */
        $getProduct = $this->ProductRepo->read($product->id);
        $this->assertNull($getProduct);
    }
    private function __setUpProductEntity()
    {
        /*
         * User try to setup
         * new Product entity object
         */
        $room = new ProductEntity;
        $room->id = 1;
        $room->name = "test product 1";
        $room->created_at = date('c');
        $room->updated_at = date('c');
        return $room;
    }
}