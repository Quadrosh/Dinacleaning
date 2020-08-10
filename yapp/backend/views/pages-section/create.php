<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PagesSection */

$this->title = 'Create Pages Section';
$this->params['breadcrumbs'][] = ['label' => 'Pages Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
if (Yii::$app->request->get('page_id')) {
    $model->page_id = Yii::$app->request->get('page_id');
}
?>
<div class="pages-section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
