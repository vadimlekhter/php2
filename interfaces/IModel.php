<?php

namespace app\interfaces;

interface IModel
{
    function getOne(int $id);

    function getSome();

    function getAll();

    function setOne();

    function setSome();

    function getTableName() : string ;
}