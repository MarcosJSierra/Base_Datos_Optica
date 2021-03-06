<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Venta */

$this->title = Yii::t('app', 'Update Venta: {name}', [
    'name' => $model->idVenta,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idVenta, 'url' => ['view', 'id' => $model->idVenta]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="venta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
