<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bron */

$this->title = 'Create Bron';
$this->params['breadcrumbs'][] = ['label' => 'Brons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bron-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
