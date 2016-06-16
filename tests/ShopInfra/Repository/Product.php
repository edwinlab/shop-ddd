<?php
namespace ShopInfra\Repository;
use Shop\Base\Entity;
use Shop\Repository\Product as ProductRepo;
use Shop\Utility\InMemory;
class Product implements ProductRepo
{
    private $engine;
    public function __construct()
    {
        $this->engine = new InMemory;
    }
    public function create(Entity $product)
    {
        $this->engine->onMap($product->id, $product);
    }
    public function read($id)
    {
        return $this->engine->fromMap($id);
    } 
    public function update(Entity $product)
    {
        $this->engine->onMap($product->id, $product);
    }
    public function destroy($id)
    {
        $this->engine->removeFromMap($id);
    } 
}