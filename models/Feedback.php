<?php

namespace app\models;


class Feedback extends Record
{
    public $id;
    public $id_good;
    public $author;
    public $text;

    /**
     * Feedback constructor.
     * @param $id
     * @param $id_good
     * @param $author
     * @param $text
     */
    public function __construct($id = null, $id_good = null, $author = null, $text = null)
    {
        $this->id = $id;
        $this->id_good = $id_good;
        $this->author = $author;
        $this->text = $text;
    }
}