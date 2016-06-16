<?php
namespace Shop\Entity;
use Shop\Base\Entity;
class Product implements Entity
{
    public $id;
    public $name;
    public $price
    public $created_at;
    public $updated_at;
}