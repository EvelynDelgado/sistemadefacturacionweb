<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\VentaCabecera */

$this->title = 'Crear Venta';
$this->params['breadcrumbs'][] = ['label' => 'Venta Cabeceras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="venta-cabecera-crear">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>
