<?php

namespace app\models;

use \app\interfaces\IRecord;
//use \app\interfaces\IDb;
use app\services\Db;

class RecordExeption extends \Exception {}

abstract class Record implements IRecord
{

}