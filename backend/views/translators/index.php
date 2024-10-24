<?php

use backend\models\Translator;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Translators';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="translator-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Translator', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('All Translators', ['index'], ['class' => 'btn btn-secondary']) ?>
        <?= Html::a('Weekdays', ['index', 'availability' => 'weekdays'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Weekend', ['index', 'availability' => 'weekend'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'availability',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Translator $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
