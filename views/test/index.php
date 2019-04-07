<?php
/* @var $this yii\web\View */
/* @var $name string */
/* @var $product \app\models\Product */
/* @var $testProperty \app\components\TestService */

$this->title = 'Test';
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="test-index">
    <p>This is view of test</p>
    <p>Hello, <?= $name ?></p>
    <?= \yii\widgets\DetailView::widget(['model'=>$product]); ?>
    <p>testProperty=<?= $testProperty ?></p>
 </div>
