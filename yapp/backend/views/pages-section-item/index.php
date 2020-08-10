<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PagesSectionItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages Section Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-section-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pages Section Item', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'section_id',
            'sort',
            'head',
            'description',
            //'text:ntext',
            //'conclusion',
            //'image',
            //'image_alt',
            //'image_title:ntext',
            //'call2action_description',
            //'call2action_name',
            //'call2action_link',
            //'call2action_class',
            //'call2action_comment',
            //'structure:ntext',
            //'custom_class:ntext',
            //'color_key',
            //'view',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
