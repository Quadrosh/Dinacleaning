<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesSectionItem */

$this->title = 'Create Pages Section Item';
$this->params['breadcrumbs'][] = ['label' => 'Pages Section Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->request->get('section_id')) {
    $model->section_id = Yii::$app->request->get('section_id');
}

?>
<div class="pages-section-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
