<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lentesemi */

$this->title = $model->idLente_Semiterminado;
$this->params['breadcrumbs'][] = ['label' => 'Lentesemis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="lentesemi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idLente_Semiterminado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idLente_Semiterminado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idLente_Semiterminado',
            'Tipo_Lente',
            'Graduacion_Base',
            'Material',
            'Precio_Compra',
            'Existencia',
            'Lente_Semiterminadocol',
        ],
    ]) ?>

</div>
