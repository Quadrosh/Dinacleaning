<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PagesSectionItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-section-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-2">
            <?= $form->field($model, 'section_id')->textInput(['readonly'=>$model->section_id]) ?>
        </div>
        <div class="col-sm-7">
            <?php if ($model->section_id) {
                echo '<h4>'.$model->section->head.'</h4>';
            }?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'sort')->textInput() ?>
        </div>

    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'head')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'description')->textarea(['maxlength' => true,'rows' => 1]) ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'text')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'conclusion')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-sm-2">
            <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($model, 'image_alt')->textarea(['maxlength' => true,'rows' => 1]) ?>
        </div>
        <div class="col-sm-5">
            <?= $form->field($model, 'image_title')->textarea(['rows' => 1]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <?= $form->field($model, 'call2action_name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'call2action_link')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'call2action_class')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'call2action_description')->textarea(['maxlength' => true,'rows' => 1]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'call2action_comment')->textarea(['maxlength' => true,'rows' => 1]) ?>
        </div>

        <div class="col-sm-3">
            <?= $form->field($model, 'color_key')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'custom_class')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'structure')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-3">
            <?= $form->field($model, 'view')->textInput(['maxlength' => true]) ?>
        </div>
    </div>










    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
