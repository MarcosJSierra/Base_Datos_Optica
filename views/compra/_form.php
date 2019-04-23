<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datetimepicker\DateTimePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Compra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="compra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Fecha')->widget(DateTimePicker::className(), [
                                                                        'language' => 'es',
                                                                        'size' => 'ms',
                                                                        //'template' => '{input}',
                                                                        'pickButtonIcon' => 'glyphicon glyphicon-time',
                                                                        'inline' => false,
                                                                        'clientOptions' => [
                                                                          //'startView' => 1,
                                                                           // 'minView' => 0,
                                                                            //'maxView' => 1,
                                                                            'autoclose' => true,
                                                                            'linkFormat' => 'HH:ii P', // if inline = true
                                                                            // 'format' => 'HH:ii P', // if inline = false
                                                                            'todayBtn' => true
                                                                        ]]) ?>
                                                                        
    <?= $form->field($model, 'ID_proveedores')->Widget(Select2::classname(),[
        'data' => $proveedoress,
        'options'=>['placeholder'=>'Seleccione el proveedor'],
        'pluginOptions'=>['allowClear=>true'],
    ]) ?>


    <?= $form->field($model, 'No_Factura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Monto_Efectivo')->textInput() ?>

    <?= $form->field($model, 'Credito')->textInput() ?>

    


<!--
    <?= $form->field($model, 'Total')->textInput() ?>

    <?= $form->field($model, 'Finalizado')->textInput() ?>
-->
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Siguiente'), ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Registrar Nuevo Proveedor'), ['proveedores/createc'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancelar'), ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
