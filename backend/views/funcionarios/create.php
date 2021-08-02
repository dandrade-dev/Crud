<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Funcionarios */

    $this->title = 'Cadastrar Funcionarios';
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="funcionarios-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
