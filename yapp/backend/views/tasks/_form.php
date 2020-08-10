<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6">


            <?= $form->field($model, 'parent_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Tasks::find()->all(), 'id','name'),['prompt'=>'не выбрано']) ?>
        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'description')->textarea(['rows' => 1]) ?>

        </div>
        <div class="col-sm-6">
            <?= $form->field($model, 'image')->textarea(['rows' => 1]) ?>
        </div>
        <div class="col-sm-12">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
    </div>





<!--    --><?//= $form->field($model, 'price')->textInput() ?>
<!---->
<!--    --><?//= $form->field($model, 'price_description')->textarea(['rows' => 1]) ?>




    <?php ActiveForm::end(); ?>

</div>
