<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cargo */

$this->title = 'Atualizar Cargo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cargo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
