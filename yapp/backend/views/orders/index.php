<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Alert::widget() ?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Orders', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('проверка sms', ['sms'], ['class' => 'btn btn-danger']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'user_id',
            'work_date',
            'work_type',
            'workplace',
             'area',
             'address',
             'name',
             'phone',
             'comment:ntext',
            'utm_source',
            'utm_medium',
            'utm_campaign',
            'utm_term',
            'utm_content',
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
            // 'contacts',
            // 'to_master_id',
            // 'email:email',
//             'date',
            // 'status',
            // 'rooms',
            // 'windows',
            // 'windows_qnt',
            // 'work_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
