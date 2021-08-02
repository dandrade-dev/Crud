<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CargoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cargos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Cadastrar Cargo', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,

            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'nome',
                'created_at:date',
                'updated_at:date',

                [
                        'class' => 'yii\grid\ActionColumn',
                    'visibleButtons' =>[
                            'view' => false,
                    ]
                ],
            ],
        ]); ?>
    </div>
</div>
