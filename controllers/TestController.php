<?php


namespace app\controllers;


use app\components\TestService;
use app\models\Product;
use yii\web\Controller;

class TestController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $testProperty = \Yii::$app->test->getTestProperty();
        $product = new Product();
        $product->id = 1;
        $product->name = "Mouse";
        $product->price = 20;
        $product->count = 2;
        $product->description = "Game mouse";
        //return "Test text";
        //return $this->renderContent("Test text");
        return $this->render('index', ['name' => 'Boris', 'product' => $product, 'testProperty' => $testProperty]);
    }


}