<?php

namespace app\controllers;

use app\models\Task;
use Yii;
use app\models\User;
use yii\base\Exception;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model->creator_id=1;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionTest()
    {
//        $user = new User();
//        $user->username = "Anton";
//        $user->password_hash = "18273645";
//        $user->creator_id = 2;
//        $user->created_at = time();
//        _end($user->save());
//        $user = User::findOne(5);
//        $task = new Task();
//        $task->title = "Bulb";
//        $task->description = "Buy bulb for my lamp";
//        $task->created_at = time();
//        $task->link(Task::RELATION_CREATOR, $user);
//        $user = User::findOne(3);
//        $task = new Task();
//        $task->title = "Vacation";
//        $task->description = "buy plane tickets";
//        $task->created_at = time();
//        $task->link(Task::RELATION_CREATOR, $user);
//        $user = User::findOne(4);
//        $task = new Task();
//        $task->title = "Hospital";
//        $task->description = "Visit ant in hospital";
//        $task->created_at = time();
//        $task->link(Task::RELATION_CREATOR, $user);
//        $models=User::find()->with(User::RELATION_TASKS)->all();
//        foreach ($models as $model){
//            var_dump($model);
//        }
//        $models=User::find()->joinWith(User::RELATION_TASKS)->all();
//        foreach ($models as $model){
//            var_dump($model);
//        }
//        $task=Task::findOne(1);
//        _end($task->getAccessedUsers()->all());
//        for ($i = 1; $i < 6; $i++) {
//            $user = User::find()->where(['id'=>$i])->one();
//            $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($user->password_hash);
//            $user->save();
//        }
        $users = User::find()->all();
        foreach($users as $user)
        {
            $user->password_hash = \Yii::$app->getSecurity()->generatePasswordHash($user->password_hash);
            $user->save();
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
