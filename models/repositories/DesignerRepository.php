<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 20:00
 */

namespace app\models\repositories;


use app\models\Designer;

class DesignerRepository extends Repository
{
    public function getTableName(): string
    {
        return 'designers';
    }

    public function getRecordClass()
    {
        return Designer::class;
    }
}