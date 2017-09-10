<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VentaCabeceraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="venta-cabecera-buscar">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

        <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'total') ?>

    <?= $form->field($model, 'subtotal') ?>

    <?= $form->field($model, 'iva') ?>

    <?php // echo $form->field($model, 'cliente_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Quitar Filtros', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
