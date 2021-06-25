<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bron */

$this->title = 'Update Bron: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bron-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
