<?php

namespace App\Repository;

use App\Models\Product;
use App\Repository\Contract\AbstractRepository;

class ProductRepository extends AbstractRepository {
    public function __construct()
    {
        $this->model = new Product();
    }

}

/*
Error
PHP 8.1.25
10.30.1
Class "App\Repository\Contract\AbstractRepository" not found

Expand vendor frames
app
 / 
Repository
 / 
UserRepository
.php
 
: 8
include
2 vendor frames
ReflectionClass
0
__construct
47 vendor frames
app
 / 
Repository
 / 
UserRepository
.php
 
: 8
 */
