<?php


namespace app\components;


use yii\base\Component;

class TestService extends Component
{
    public $testProperty = 'defaultValue';

    public function getTestProperty()
    {
        return $this->testProperty;
    }

}