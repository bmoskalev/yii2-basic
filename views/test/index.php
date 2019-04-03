<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $product \app\models\Product */

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="test-index">
    <p>This is view of test</p>
    <p>Hello, <?= $name ?></p>
    <?= \yii\widgets\DetailView::widget(['model'=>$product]); ?>
 </div>
