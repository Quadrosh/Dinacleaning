<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'icon')->textarea(['rows' => 1]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <?= $form->field($model, 'type')->dropDownList(\yii\helpers\ArrayHelper::map(app\models\CleanType::find()->all(), 'id','name')) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'image')->textarea(['rows' => 1]) ?>
        </div>
    </div>

    <?= $form->field($model, 'text')->textarea(['rows' => 3]) ?>





    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
