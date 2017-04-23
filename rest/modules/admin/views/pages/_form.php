<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pages */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container">
    <div class="pages-form">
        <div class="row">
            <?php $form = ActiveForm::begin(); ?>
            <div class="col-sm-6"><?= $form->field($model, 'hrurl')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-6"><?= $form->field($model, 'seo_insert')->textarea(['rows' => 1]) ?></div>

            <div class="col-sm-6"> <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-6"><?= $form->field($model, 'pagehead')->textInput(['maxlength' => true]) ?></div>

            <div class="col-sm-6"><?= $form->field($model, 'description')->textarea(['rows' => 2]) ?></div>
            <div class="col-sm-6"><?= $form->field($model, 'pagedescription')->textarea(['rows' => 2]) ?></div>

            <div class="col-sm-12"><?= $form->field($model, 'keywords')->textarea(['rows' => 1]) ?></div>

            <div class="col-sm-12"> <?= $form->field($model, 'text')->textarea(['rows' => 3]) ?></div>

            <div class="col-sm-6"><?= $form->field($model, 'imagelink')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-6"><?= $form->field($model, 'imagelink_alt')->textInput(['maxlength' => true]) ?></div>

            <div class="col-sm-4"> <?= $form->field($model, 'sendtopage')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-4"><?= $form->field($model, 'promolink')->textInput(['maxlength' => true]) ?></div>
            <div class="col-sm-4"><?= $form->field($model, 'promoname')->textInput(['maxlength' => true]) ?></div>



            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>


    </div>
</div>

