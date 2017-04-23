<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HomeSlides */

$this->title = 'Update Home Slides: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Home Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="home-slides-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
