<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PagesSectionItem */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pages Section Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pages-section-item-view">

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
            'section_id',
            'sort',
            'head',
            'description',
            'text:ntext',
            'conclusion',
            'image',
            'image_alt',
            'image_title:ntext',
            'call2action_description',
            'call2action_name',
            'call2action_link',
            'call2action_class',
            'call2action_comment',
            'structure:ntext',
            'custom_class:ntext',
            'color_key',
            'view',
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
