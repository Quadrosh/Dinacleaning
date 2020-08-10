<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Review */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Reviews', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="review-view">

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
            'name',
//            'type',
            [
                'attribute'=> 'type',
                'value' => common\models\CleanType::find()->where(['id'=>$model['type']])->one()->name,
            ],
            'text:ntext',
            'image:ntext',
            'icon:ntext',
            ['attribute'=>'created_at', 'format'=> 'html',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data['created_at'], 'HH:mm dd/MM/yy');
                },
            ],
            ['attribute'=>'updated_at', 'format'=> 'html',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data['updated_at'], 'HH:mm dd/MM/yy');
                },
            ],
        ],
    ]) ?>

</div>
