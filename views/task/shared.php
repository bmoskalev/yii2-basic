<?php

use app\models\Task;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shared Tasks';
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-my">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'title',
            'description:ntext',
            [
                'label' => 'Users',
                'value' => function (Task $model) {
                    return join(', ', $model->getSharedUsers()->select('username')->column());
                }],
            'created_at:datetime',
            'updated_at:datetime',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{deleteall}',
                'buttons' => [
                    'deleteall' => function ($url, $model, $key) {
                        $icon = \yii\bootstrap\Html::icon('remove');
                        return Html::a($icon, ['task-user/delete-all', 'id' => $model->id], [
                            'title' => 'Удалить доступ',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete the access for all users?',
                                'method' => 'post',
                            ]]);
                    },
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
