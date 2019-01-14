<?php

namespace app\interfaces;

interface IController
{
    function runAction($action = null);

    function actionIndex();
}