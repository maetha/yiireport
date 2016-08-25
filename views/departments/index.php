<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php
    $gridColumns = [
        'department',
        'depgroup.namegroup'
    ];
    echo ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'exportConfig' => [
            ExportMenu::FORMAT_EXCEL => false,
            ExportMenu::FORMAT_HTML => false,
            ExportMenu::FORMAT_TEXT => false,
            ExportMenu::FORMAT_CSV => false,
            ExportMenu::FORMAT_PDF => false,
        ],
        'columns' => $gridColumns
    ]);
    ?>  

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //'depgroup.namegroup',
            [
                'attribute' => 'group_id',
                'value' => 'depgroup.namegroup'
            ],
            'department',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
