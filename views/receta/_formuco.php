<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Receta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="receta-form">

    <?php $form = ActiveForm::begin(); ?>

  

    <?= $form->field($model, 'Esfera_OD')->textInput() ?>

    <?= $form->field($model, 'Esfera_OI')->textInput() ?>

    <?= $form->field($model, 'Eje_OD')->textInput() ?>

    <?= $form->field($model, 'Eje_OI')->textInput() ?>

    <?= $form->field($model, 'Cilindro_OD')->textInput() ?>

    <?= $form->field($model, 'Cilindro_OI')->textInput() ?>

    <?= $form->field($model, 'AdicionOD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AdicionOI')->textInput(['maxlength' => true]) ?>
<!--
    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'idPaciente')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Registrar'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), ['orden/create','idrec'=>$idrec ,'id'=>$id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
