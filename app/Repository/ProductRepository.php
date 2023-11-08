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
