<?php
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1>hash</h1>

<?php //Pjax::begin(); ?>
<!---->
<?//= Html::beginForm(['/admin/hash/index'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
<?//= Html::input('text', 'string', Yii::$app->request->post('password'), ['class' => 'form-control']) ?>
<?//= Html::submitButton('Получить хеш', ['class' => 'btn btn-md btn-primary', 'name' => 'hash-button']) ?>
<?//= Html::endForm() ?>
<!---->
<?php ////$form = ActiveForm::begin([['/admin/hash/index'], 'post', ['data-pjax' => '', 'class' => 'form-inline']]); ?>
<!--<!---->-->
<?////= $form->field($model, 'hash')->textInput(['maxlength' => true]) ?>
<!--<!---->-->
<!--<!--    <div class="form-group">-->-->
<!--<!--        -->--><?////= Html::submitButton('Получить хеш', ['class' => 'btn btn-success']) ?>
<!--<!--    </div>-->-->
<!--<!---->-->
<?php ////ActiveForm::end(); ?>
<!---->
<!---->
<!---->
<!--    <h3>--><?//= $hash ?><!--</h3>-->
<?php //Pjax::end(); ?>
<!---->
<?php //Pjax::begin(); ?>
<!---->
<?//= Html::beginForm(['/admin/hash/index'], 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>
<?//= Html::input('text', 'string', Yii::$app->request->post('hashed'), ['class' => 'form-control']) ?>
<?//= Html::submitButton('Получить дехеш', ['class' => 'btn btn-md btn-primary', 'name' => 'hash-button']) ?>
<?//= Html::endForm() ?>
<!---->
<!--    <h3>--><?//= $unhash ?><!--</h3>-->
<!---->
<?php //Pjax::end(); ?>