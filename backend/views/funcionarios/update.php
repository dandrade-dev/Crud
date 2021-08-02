<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Funcionarios */

$this->title = 'Atualizar Funcionarios: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="funcionarios-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
