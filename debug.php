<?php

use yii\helpers\Vardumper;

function _log($data)
{
    \Yii::info(Vardumper::dumpAsString($data, 5), '_');
}

function _end($data)
{
    echo Vardumper::dumpAsString($data, 5,true);
    exit();
}
