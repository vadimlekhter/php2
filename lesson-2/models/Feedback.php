<?php

namespace app\models;


class Feedback extends Model
{
    public $id_good;
    public $id_feedback;
    public $author;
    public $text;

    public function getTableName():string
    {
        return 'feedbacks';
    }
}