<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\widgets\Alert;

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
        <?= Html::a('sms', ['sms'], ['class' => 'btn btn-danger']) ?>
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
            // 'contacts',
            // 'to_master_id',
            // 'email:email',
            // 'date',
            // 'status',
            // 'rooms',
            // 'windows',
            // 'windows_qnt',
            // 'work_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
