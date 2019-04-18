<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orden */

$this->title = $model->Orden;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ordens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orden-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Entregar'), ['update1', 'id' => $model->Orden], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->Orden], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

   <p><li><label>Informacion Orden:</label>:</li> </p>
     <?= DetailView::widget([

        'model' => $model,
        'attributes' => [
            //'Orden',
            //'idReceta',
            //'idLentei',
            'Fecha_Entrega',
            //'Total_orden',
            //'idAro',
            'Anotaciones:ntext',
            'No_Caja',
            //'idVenta',
            //'Preciolentei',
            //'PrecioVentaAros',
            //'Entregada',
            //'Preciolented',
            //'idLented',
        ],
    ]) ?>
<p><li><label>Informacion Receta:</label>:</li> </p>
     <?= DetailView::widget([
        'model' => $model4,
        'attributes' => [
            'idReceta',
            'Fecha',
            'Esfera_OD',
            'Esfera_OI',
            'Eje_OD',
            'Eje_OI',
            'Cilindro_OD',
            'Cilindro_OI',
            'AdicionOD',
            'AdicionOI',
        ],
    ]) ?>


</div>