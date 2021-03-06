<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Receta */

$this->title = Yii::t('app', 'Editar Receta: {name}', [
    'name' => $model->idReceta,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recetas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idReceta, 'url' => ['view', 'id' => $model->idReceta]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="receta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formuco', [
        'model' => $model,
        'id'=>$id,
        'idrec'=>$idrec,
    ]) ?>

</div>
