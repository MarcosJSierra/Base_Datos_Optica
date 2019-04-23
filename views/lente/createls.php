<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Lente */

$this->title = Yii::t('app', 'Registrar Nuevo Lente Semiterminado');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lentes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lente-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formls', [
        'model' => $model,
        'id'=>$id,
    ]) ?>

</div>
