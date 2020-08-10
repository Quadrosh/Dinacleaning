<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CleanType */

$this->title = 'Update Clean Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Clean Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clean-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
