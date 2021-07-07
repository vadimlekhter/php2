<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 19:59
 */

namespace app\models\repositories;


use app\models\Category;

class CategoryRepository extends Repository
{
    public function getTableName(): string
    {
        return 'categories';
    }

    public function getRecordClass()
    {
        return Category::class;
    }
}