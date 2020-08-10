<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use \yii\widgets\ActiveForm;

$uploadmodel = new \common\models\UploadForm();

/* @var $this yii\web\View */
/* @var $model app\models\Pages */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-view">

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
            'hrurl:url',
            'seo_insert:ntext',
            'title',
            'description:ntext',
            'keywords:ntext',
            'pagehead',
            'pagedescription:ntext',
            'text:ntext',
            'imagelink',
            'imagelink_alt',
            'sendtopage',
            'promolink',
            'promoname',

            'image',
            'image_alt',
            'image_title',
            'layout',
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

<section>
    <div class="row">
        <div class="col-sm-12">
            <?php if ($model->image) : ?>
                <h4>Page image</h4>
                <?= Html::img('/img/'. $model->image, ['class'=>'img']) ?>
            <?php endif; ?>
        </div>


        <div class="col-xs-6 col-sm-3">
            <h4>Image Upload</h4>
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'action' => ['/pages/image-upload'],
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
            <?= $form->field($uploadmodel, 'toModelProperty')->dropDownList([
                'image'=>'Image',
                'imagelink'=>'Imagelink',
            ])->label(false) ?>
            <?= $form->field($uploadmodel, 'imageFile')->fileInput(['class'=>'fileField'])->label(false) ?>
            <?= $form->field($uploadmodel, 'toModelId')->hiddenInput(['value'=>$model->id])->label(false) ?>
            <?= Html::submitButton('Upload', ['class' => 'btn btn-success']) ?>
            <?php ActiveForm::end() ?>
        </div>
    </div>

</section>

<section>
    <?= Html::a('Добавить секцию','/pages-section/create?page_id='.$model->id, ['class' => 'mt50 btn btn-success']) ?>

    <?php if ($model->sections) : ?>
        <h2>Секции</h2>
        <?php foreach ($model->sections as $key => $section) : ?>
            <div class="row page_section_head">
                <div class="col-sm-4">
                    Секция: <?=  $key+1 ?>. <?= $section->sort?'<sup class="glyphicon glyphicon-sort-by-attributes"></sup>'.$section->sort:'' ?>

                    <?= \yii\helpers\Html::a( '<span class="glyphicon glyphicon-arrow-up"></span>', '/pages-section/move-up?id='.$section->id,
                        [
                            'title' => Yii::t('yii', 'Переместить вверх'),
                            'data-method'=>'post'
                        ]); ?> <?= \yii\helpers\Html::a( '<span class="glyphicon glyphicon-arrow-down"></span>', '/pages-section/move-down?id='.$section->id,
                        [
                            'title' => Yii::t('yii', 'Переместить вниз'),
                            'data-method'=>'post'
                        ]); ?>
                    <?= \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', '/pages-section/update?id='.$section->id,
                        [
                            'title' => Yii::t('yii', 'Редактировать секцию'),
                            'data-method'=>'post'
                        ]); ?> <?= \yii\helpers\Html::a( '<span class="glyphicon glyphicon-open-file"></span>', '/pages-section-item/create?section_id='.$section->id,
                        [
                            'title' => Yii::t('yii', 'Добавить item'),
                            'data-method'=>'post'
                        ]); ?>
                    <?= \yii\helpers\Html::a( '<span class="glyphicon glyphicon-trash"></span>', '/pages-section/delete?id='.$section->id,
                        [
                            'title' => Yii::t('yii', 'Удалить секцию'),
                            'data-confirm' =>'Точно удалить секцию с содержимым?',
                            'data-method'=>'post'
                        ]); ?>

                </div>
                <div class="col-sm-8">
                    <?php $form = ActiveForm::begin([
                        'method' => 'post',
                        'action' => ['/pages-section/image-upload'],
                        'options' => ['enctype' => 'multipart/form-data'],
                    ]); ?>
                    <div class="row">
                        <div class="col-sm-4">
                            <?= $form->field($uploadmodel, 'toModelProperty')->dropDownList([
                                'image'=>'Image',
                            ])->label(false) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= $form->field($uploadmodel, 'imageFile')
                                ->fileInput(['class'=>'fileField'])->label(false) ?>
                            <?= $form->field($uploadmodel, 'toModelId')->hiddenInput(['value'=>$section->id])->label(false) ?>
                        </div>
                        <div class="col-sm-4">
                            <?= Html::submitButton('Upload', ['class' => 'btn btn-success btn-xs']) ?>
                        </div>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>

            </div>

        <ul class="admin_section_ul">
            <li>ID - <?= $section->id ?><?= $section->sort?', Sort - '.$section->sort:'' ?></li>
            <?= $section->head?'<li> Head - '.$section->head.'</li>':'' ?>
            <?= $section->description?'<li> Description - '.$section->description.'</li>':'' ?>
            <?= $section->text?'<li> Text - '.\common\models\Pages::excerpt($section->text,100).'</li>':'' ?>
            <?php
            $sectionImageLi='';
            if ($section->image) {
                if (strpos($section->image,'<svg')!==false) {
                    $sectionImageLi = '<li class="viewImageSvg"> Image <sup>svg</sup> - '.$section->image.'</li>';
                } else {
                    $sectionImageLi = '<li> Image - '
                        .Html::img('/img/'. $section->image, ['class'=>'thumb'])
                        .'<sup>'.$section->image.'</sup>'
                        .Html::a( '<span class="glyphicon glyphicon-trash"></span>',
                            '/pages-section/delete-image?id='.$section->id.'&propertyName=image',
                            [
                                'title' => Yii::t('yii', 'Удалить image'),
                                'data-confirm' =>'Точно удалить?',
                                'data-method'=>'post'
                            ])
                        .'</li>';
                }
            }
            ?>
            <?= $section->image?$sectionImageLi:'' ?>
            <?= $section->image_alt?'<li class="text-success"> Image Alt - '.$section->image_alt.'</li>':'' ?>
            <?= $section->image_title?'<li class="text-warning"> Image Title - '.$section->image_title.'</li>':'' ?>

            <?= $section->call2action_name?'<li> Call2Action Name - '.$section->call2action_name.'</li>':'' ?>
            <?= $section->call2action_link?'<li> Call2Action Link - '.$section->call2action_link.'</li>':'' ?>
            <?= $section->call2action_class?'<li> Call2Action Class - '.$section->call2action_class.'</li>':'' ?>
            <?= $section->call2action_description?'<li> Call2Action Description - '.$section->call2action_description.'</li>':'' ?>
            <?= $section->call2action_comment?'<li> Call2Action Comment - '.$section->call2action_comment.'</li>':'' ?>
            <?= $section->view?'<li> View - '.$section->view.'</li>':'' ?>
            <?= $section->color_key?'<li> Color Key - '.$section->color_key.'</li>':'' ?>
            <?= $section->structure?'<li> Structure - '.$section->structure.'</li>':'' ?>
            <?= $section->custom_class?'<li> Custom Class - '.$section->custom_class.'</li>':'' ?>
            <?php if ($section->items) : ?>
            <li>Items
                <?php $blockNum=1; foreach ($section->items as $itemKey => $item) : ?>
                <ul>
                    <div class="row mt20">
                        <div class="col-sm-4">
                            Item <?= $itemKey+1 ?>. <?= $item->sort?'<sup class="glyphicon glyphicon-sort-by-attributes"></sup>'.$item->sort:'' ?>
                            <?= \yii\helpers\Html::a( '<span class="glyphicon glyphicon-arrow-up"></span>', '/pages-section-item/move-up?id='.$item->id,
                                [
                                    'title' => Yii::t('yii', 'Переместить вверх'),
                                    'data-method'=>'post'
                                ]); ?> <?= \yii\helpers\Html::a( '<span class="glyphicon glyphicon-arrow-down"></span>', '/pages-section-item/move-down?id='.$item->id,
                                [
                                    'title' => Yii::t('yii', 'Переместить вниз'),
                                    'data-method'=>'post'
                                ]); ?>

                            <?= \yii\helpers\Html::a( '<span class="glyphicon glyphicon-pencil"></span>', '/pages-section-item/update?id='.$item->id,
                                [
                                    'title' => Yii::t('yii', 'Редактировать блок'),
                                    'data-method'=>'post'
                                ]); ?>
                            <?= \yii\helpers\Html::a( '<span class="glyphicon glyphicon-trash"></span>', '/pages-section-item/delete?id='.$item->id,
                                [
                                    'title' => Yii::t('yii', 'Удалить блок'),
                                    'data-confirm' =>'Точно удалить?',
                                    'data-method'=>'post'
                                ]); ?>
                        </div>
                        <div class="col-sm-8">
                            <?php $form = ActiveForm::begin([
                                'method' => 'post',
                                'action' => ['/pages-section-item/image-upload'],
                                'options' => ['enctype' => 'multipart/form-data'],
                            ]); ?>
                            <div class="row">
                                <div class="col-sm-4">
                                    <?= $form->field($uploadmodel, 'toModelProperty')->dropDownList([
                                        'image'=>'Image',
                                    ])->label(false) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= $form->field($uploadmodel, 'imageFile')
                                        ->fileInput(['class'=>'fileField'])->label(false) ?>
                                    <?= $form->field($uploadmodel, 'toModelId')->hiddenInput(['value'=>$item->id])->label(false) ?>
                                </div>
                                <div class="col-sm-4">
                                    <?= Html::submitButton('Upload', ['class' => 'btn btn-success btn-xs']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end() ?>
                        </div>
                    </div>

                    <li>ID - <?= $item->id ?><?= $item->sort?', Sort - '.$item->sort:'' ?></li>
                    <?= $item->head?'<li> Head - '.$item->head.'</li>':'' ?>
                    <?= $item->description?'<li> Description - '.$item->description.'</li>':'' ?>
                    <?= $item->text?'<li> Text - '.\common\models\Pages::excerpt($item->text,100).'</li>':'' ?>
                    <?php
                    $itemImageLi='';
                    if ($item->image) {
                        if (strpos($item->image,'<svg')!==false) {
                            $itemImageLi = '<li class="viewImageSvg"> Image <sup>svg</sup> - '.$item->image.'</li>';
                        } else {
                            $itemImageLi = '<li> Image - '
                                .Html::img('/img/'. $item->image, ['class'=>'thumb'])
                                .'<sup>'.$section->image.'</sup>'
                                .Html::a( '<span class="glyphicon glyphicon-trash"></span>',
                                    '/pages-section-item/delete-image?id='.$item->id.'&propertyName=image',
                                    [
                                        'title' => Yii::t('yii', 'Удалить image'),
                                        'data-confirm' =>'Точно удалить?',
                                        'data-method'=>'post'
                                    ])
                                .'</li>';
                        }
                    }
                    ?>
                    <?= $item->image?$itemImageLi:'' ?>
                    <?= $item->image_alt?'<li class="text-success"> Image Alt - '.$item->image_alt.'</li>':'' ?>
                    <?= $item->image_title?'<li class="text-warning"> Image Title - '.$item->image_title.'</li>':'' ?>

                    <?= $item->call2action_name?'<li> Call2Action Name - '.$item->call2action_name.'</li>':'' ?>
                    <?= $item->call2action_link?'<li> Call2Action Link - '.$item->call2action_link.'</li>':'' ?>
                    <?= $item->call2action_class?'<li> Call2Action Class - '.$item->call2action_class.'</li>':'' ?>
                    <?= $item->call2action_description?'<li> Call2Action Description - '.$item->call2action_description.'</li>':'' ?>
                    <?= $item->call2action_comment?'<li> Call2Action Comment - '.$item->call2action_comment.'</li>':'' ?>
                    <?= $item->view?'<li> View - '.$item->view.'</li>':'' ?>
                    <?= $item->color_key?'<li> Color Key - '.$item->color_key.'</li>':'' ?>
                    <?= $item->structure?'<li> Structure - '.$item->structure.'</li>':'' ?>
                    <?= $item->custom_class?'<li> Custom Class - '.$item->custom_class.'</li>':'' ?>
                </ul>
                <?php endforeach; // $section->items ?>
            </li>
        <?php endif; // $section->items ?>

        </ul>

        <?php endforeach; // $model->sections ?>



        <?= Html::a('Добавить секцию','/pages-section/create?page_id='.$model->id, ['class' => 'mt50 btn btn-success']) ?>
    <?php endif; ?>




</section>