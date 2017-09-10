<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactoGrupo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12">

    <div class="contacto-grupo-form">

        <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'contacto_id')->textInput() ?>

    <?= $form->field($model, 'grupo_id')->textInput() ?>

        <div class="form-group">
            <center>       
                <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
            </center> 
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
