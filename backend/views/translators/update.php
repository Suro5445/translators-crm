<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Translator $model */

$this->title = 'Update Translator: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Translators', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="translator-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
