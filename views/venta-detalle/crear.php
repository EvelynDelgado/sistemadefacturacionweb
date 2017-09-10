<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VentaDetalle */

$this->title = 'Crear Venta Detalle';
$this->params['breadcrumbs'][] = ['label' => 'Venta Detalles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="venta-detalle-crear">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>
