<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VentaDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> </h3>
            <div class="venta-detalle-form">

                <?php $form = ActiveForm::begin(); ?>

                <div class='col-md-4'> <?= $form->field($model, 'venta_cabecera_id')->textInput() ?>

 </div><div class='col-md-4'> <?= $form->field($model, 'producto_id')->textInput() ?>

 </div><div class='col-md-4'> <?= $form->field($model, 'cantidad')->textInput() ?>

 </div><div class='col-md-4'> <?= $form->field($model, 'precio')->textInput(['maxlength' => true]) ?>

 </div><div class='col-md-4'> <?= $form->field($model, 'subtotal')->textInput(['maxlength' => true]) ?>

 </div><div class='col-md-4'> <?= $form->field($model, 'total')->textInput(['maxlength' => true]) ?>

 </div>                <center>
                    <div class="form-group">
                        <?=  Html::submitButton('Guardar <span class=\'glyphicon glyphicon-floppy-disk\'></span>', ['class' => 'btn btn-primary']) ?>
                        <?=   Html::a("Cancelar <span class='glyphicon glyphicon-ban-circle'></span>", ['index'], ['class' => 'btn btn-default']) ?>
                    </div>
                </center>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>
