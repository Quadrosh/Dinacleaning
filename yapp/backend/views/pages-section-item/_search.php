<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PagesSectionItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pages-section-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'section_id') ?>

    <?= $form->field($model, 'sort') ?>

    <?= $form->field($model, 'head') ?>

    <?= $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'conclusion') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'image_alt') ?>

    <?php // echo $form->field($model, 'image_title') ?>

    <?php // echo $form->field($model, 'call2action_description') ?>

    <?php // echo $form->field($model, 'call2action_name') ?>

    <?php // echo $form->field($model, 'call2action_link') ?>

    <?php // echo $form->field($model, 'call2action_class') ?>

    <?php // echo $form->field($model, 'call2action_comment') ?>

    <?php // echo $form->field($model, 'structure') ?>

    <?php // echo $form->field($model, 'custom_class') ?>

    <?php // echo $form->field($model, 'color_key') ?>

    <?php // echo $form->field($model, 'view') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
