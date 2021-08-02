<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FuncionariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Funcionarios';
$this->params['breadcrumbs'][] = $this->title;
$date = date("d/m/Y");
?>
<div class="funcionarios-index box box-primary">
    <div class="box-header with-border">
        <?= Html::a('Cadastrar Funcionarios', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <div class="box-body ">
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        <?= GridView::widget([

           // 'date' => date("d/m/Y"),
            'dataProvider' => $dataProvider,
            'layout' => "{items}\n{summary}\n{pager}",
            'columns' => [



                'nome',
                'cpf',
                'logradouro',
                'cep',
                'cidade',
                'estado',
                'numero',
                'complemento',
                'cargo',
                'created_by',
                'updated_by',

                [
                    //'class' => 'yii\grid\DataColumn',
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:d-m-Y'],
                    ],
                [
                    //'class' => 'yii\grid\DataColumn',
                    'attribute' => 'updated_at',
                    'format' => ['date', 'php:d-m-Y'],
                ],


                [
                        'class' => 'yii\grid\ActionColumn',
                    'visibleButtons' => [
                            'view'=> false
                    ],

                ],
            ],
        ]); ?>
    </div>
</div>
