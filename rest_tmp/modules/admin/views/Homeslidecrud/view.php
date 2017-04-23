<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HomeSlides */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Home Slides', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-slides-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'lead',
            'lead2',
            'text:ntext',
            'image',
            'promolink',
            'promoname',
        ],
    ]) ?>

</div>
