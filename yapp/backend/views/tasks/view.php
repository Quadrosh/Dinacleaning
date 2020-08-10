<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tasks */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-view">

    <h1><?= $model->parent?$model->parent->name.' -> '. $this->title:$this->title ?></h1>

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
            'parent_id',
            [
                'attribute'=> 'parent_id', 'label'=>'parent',
                'value' => function($data){
                    if ($data->parent) {
                        return $data->parent->name;
                    }
                },
            ],
            'name',
            'description:ntext',
//            'price',
//            'price_description:ntext',
            'image:ntext',
        ],
    ]) ?>

</div>
