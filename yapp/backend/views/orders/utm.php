<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'UTM';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="preorders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Тип</th>
                <th>Дата работ</th>
                <th>Тип работ</th>
                <th>Телефон</th>
                <th>UTM Source</th>
                <th>UTM Medium</th>
                <th>UTM Campaign</th>
                <th>UTM Term</th>
                <th>UTM Content</th>
                <th>Создан</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($leads as $lead ) : ?>
            <tr >

                <td><?= $lead['id'] ?></td>
                <td><?= $lead['type'] ?></td>
                <td><?= $lead['work_date'] ?></td>
                <td><?= $lead['work_type'] ?></td>

                <td><?= $lead['phone'] ?></td>
                <td><?= $lead['utm_source'] ?></td>
                <td><?= $lead['utm_medium'] ?></td>
                <td><?= $lead['utm_campaign'] ?></td>
                <td><?= $lead['utm_term'] ?></td>
                <td><?= $lead['utm_content'] ?></td>
                <td><?=
                    \Yii::$app->formatter->asDatetime($lead['created_at'], 'HH:mm dd/MM/yy');
                    ?></td>
            </tr>
        <?php endforeach; ?>


        </tbody></table>


</div>
