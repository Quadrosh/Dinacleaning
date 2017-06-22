<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Callme */

$this->title = 'Create Callme';
$this->params['breadcrumbs'][] = ['label' => 'Callmes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="callme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
