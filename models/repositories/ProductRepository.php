<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 16:45
 */

namespace app\models\repositories;


use app\models\Product;

class ProductRepository extends Repository
{
    public function getTableName(): string
    {
        return 'products';
    }

    public function getRecordClass()
    {
        return Product::class;
    }

    public function getProductsByIds (array $ids) {
        $in = implode(', ', $ids);
        return $this->find("SELECT * FROM products WHERE id IN ({$in})", []);
    }

}