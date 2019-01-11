<?php

namespace app\models;


class Feedback extends Model
{
    public $id;
    public $id_good;
    public $author;
    public $text;

    public function getTableName():string
    {
        return 'feedbacks';
    }
}