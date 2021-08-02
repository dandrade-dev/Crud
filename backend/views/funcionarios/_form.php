<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Funcionarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="funcionarios-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cpf')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'logradouro')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cep')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cidade')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'complemento')->textInput(['maxlength' => true]) ?>


        <?=
        $form->field($model, 'cargoSelect')->widget(\kartik\select2\Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\common\models\Cargo::find()->all(),'id','nome'),
            'pluginOptions' => [
                'tags' => true,
                'placeholder' => 'Selecione o cargo ...',
                'multiple' => true

            ],
        ])?>



    </div>
    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Cadastrar': 'Atualizar', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
