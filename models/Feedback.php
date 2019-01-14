<?php

namespace app\models;


class Feedback extends Record
{
    public $id;
    public $id_good;
    public $author;
    public $text;

    public static function getTableName():string
    {
        return 'feedbacks';
    }
}