<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cargo */

$this->title = 'Cadastrar Cargo';
$this->params['breadcrumbs'][] = ['label' => 'Cargos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cargo-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
