<?php
namespace Shop\Entity;
use Shop\Base\Entity;
class User implements Entity
{
    public $id;
    public $username;
    public $email;
    public $password;
    public $created_at;
    public $updated_at;
}