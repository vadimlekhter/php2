<?php

namespace app\interfaces;

interface IModel
{
    function getOne(int $id);

    function getSome();

    function getAll();

    function setOne();

    function setSome();

    function updateOne();

    function updateSome();

    function deleteOne();

    function deleteSome();

    function deleteAll();

    function getTableName() : string ;
}