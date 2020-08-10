<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HomeSlides */

$this->title = 'Create Home Slides';
$this->params['breadcrumbs'][] = ['label' => 'Home Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-slides-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
