<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 20:00
 */

namespace app\models\repositories;


use app\models\Size;

class SizeRepository extends Repository
{
    public function getTableName(): string
    {
        return 'sizes';
    }

    public function getRecordClass()
    {
        return Size::class;
    }
}