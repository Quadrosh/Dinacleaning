<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Callmes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Callme', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'phone',
            'comment:ntext',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
//            'date',
            ['attribute'=>'created_at', 'format'=> 'html',
                'value' => function($data) {
                    return \Yii::$app->formatter->asDatetime($data['created_at'], 'HH:mm dd/MM/yy');
                },
            ],
//            ['attribute'=>'updated_at', 'format'=> 'html',
//                'value' => function($data) {
//                    return \Yii::$app->formatter->asDatetime($data['updated_at'], 'HH:mm dd/MM/yy');
//                },
//            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
