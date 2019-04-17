<?php


namespace app\controllers;


use app\components\TestService;
use yii\db\Query;
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

    public function actionInsert()
    {
        $data = \Yii::$app->db->createCommand()->batchInsert('user',
            ['username', 'password_hash', 'creator_id', 'created_at'],
            [
                ['Boris', '12345678', 1, time()],
                ['Valery', '21436587', 1, time()],
                ['Maxim', '87654321', 1, time()],
                ['Oleg', '78563412', 1, time()]
            ]
        )->execute();
        $data = \Yii::$app->db->createCommand()->batchInsert('task',
            ['title', 'description', 'creator_id', 'created_at'],
            [
                ['HomeWork', 'Make homework from 4 classes', 1, time()],
                ['Shop', 'Buy some products in the nearest grocery store', 1, time()],
                ['Battle task', 'Done one branch in own battle tasks', 2, time()],
                ['Homework discuss', 'Discuss with Boris questions from homework', 2, time()]
            ]
        )->execute();

    }

    public function actionSelect()
    {
        $query = new Query();
        $data1 = $query->from('user')->where('id = 1')->one();
        var_dump($data1);
        $query = new Query();
        $data2 = $query->from('user')
            ->where(['>', 'id', 1])
            ->orderBy(['username' => SORT_ASC])
            ->all();
        var_dump($data2);
        $query = new Query();
        $data3 = $query->from('user')->count();
        var_dump($data3);
        $query = new Query();
        $data4 = $query->from('task')->select('*')
            ->innerJoin('user', 'task.creator_id = user.id')
            ->all();
        var_dump($data4);
    }
}