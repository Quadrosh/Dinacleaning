<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Prices */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prices-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-4"><?= $form->field($model, 'type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\CleanType::find()->all(), 'id','name')) ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'price')->textInput() ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'list_order')->textInput() ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'name_descr')->textarea(['rows' => 1]) ?></div>
        <div class="col-sm-4"><?= $form->field($model, 'price_descr')->textarea(['rows' => 1]) ?></div>
        <div class="col-sm-12">
            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
