<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GroupsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'กลุ่มงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
<div class="groups-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> เพิ่ม', ['create'], ['class' => 'btn btn-primary']) ?>
        <div class="groups-index">
          <?= Html::a('<i class="glyphicon glyphicon-gift"></i> กลุ่มงาน', ['create'], ['class' => 'btn btn-info']) ?> 
        </div>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'namegroup',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
 
</div>
