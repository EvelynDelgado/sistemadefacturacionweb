<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12">

    <div class="usuario-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>


        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>




        <div class="form-group">
            <center>       
                <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
            </center> 
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
