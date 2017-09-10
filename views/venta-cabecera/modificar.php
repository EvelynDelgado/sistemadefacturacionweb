<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VentaCabecera */

$this->title = 'Modificar Venta: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Venta Cabeceras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['ver', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>

<div class="venta-cabecera-modificar">   

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
