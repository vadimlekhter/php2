<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 19:59
 */

namespace app\models\repositories;


use app\models\Color;

class ColorRepository extends Repository
{
    public function getTableName(): string
    {
        return 'colors';
    }

    public function getRecordClass()
    {
        return Color::class;
    }
}