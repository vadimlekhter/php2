<?php
/**
 * Created by PhpStorm.
 * User: 123
 * Date: 21.01.2019
 * Time: 20:00
 */

namespace app\models\repositories;


use app\models\Feedback;

class FeedbackRepository extends Repository
{
    public function getTableName(): string
    {
        return 'feedbacks';
    }

    public function getRecordClass()
    {
        return Feedback::class;
    }
}