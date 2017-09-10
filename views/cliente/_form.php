<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> </h3>
            <div class="cliente-form">

                <?php $form = ActiveForm::begin(); ?>

                <div class='col-md-4'> <?= $form->field($model, 'cedula')->textInput(['maxlength' => true]) ?>

 </div><div class='col-md-4'> <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

 </div><div class='col-md-4'> <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

 </div><div class='col-md-4'> <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

 </div><div class='col-md-4'> <?= $form->field($model, 'obervacion')->textarea(['rows' => 6]) ?>

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
