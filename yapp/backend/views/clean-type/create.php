<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CleanType */

$this->title = 'Create Clean Type';
$this->params['breadcrumbs'][] = ['label' => 'Clean Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clean-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
