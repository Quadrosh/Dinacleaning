<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать услугу', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'parent_id',
            [
                'attribute'=> 'parent_id', 'label'=>'parent',
                'value' => function($data){
                    if ($data->parent) {
                        return $data->parent->name;
                    }
                },
            ],
            'name',

//            [
//                'attribute'=> 'parent_id',
//                'value' => function($data)
//                {
//                    $theData = \common\models\CleanType::find()->where(['id'=>$data['type_id']])->one();
//                    return $theData['name'];
//                },
//            ],
//            'description:ntext',
//            'price',
            // 'price_description:ntext',
            // 'image:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
