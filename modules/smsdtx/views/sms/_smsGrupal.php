<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use jlorente\remainingcharacters\RemainingCharacters;
use kartik\widgets\Select2;
$this->title = 'Enviar sms grupal';
$this->params['breadcrumbs'][] = ['label' => 'Hostorial de sms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-md-12">
    
    <div class="col-md-3"></div>

<div class="col-md-6">
        <div class="contacto-create">
            <div class="box box-primary">
                <div class="box-header with-border">
          

        <?php $form = ActiveForm::begin(); ?>

        <?=
// 
        $form->field($model, 'detalle')->widget(RemainingCharacters::classname(), [
            'type' => RemainingCharacters::INPUT_TEXTAREA,
            'text' => '{n} caracteres restantes',
            'label' => [
                'tag' => 'p',
                'id' => 'my-counter',
                'class' => 'counter',
                'invalidClass' => 'error'
            ],
            'options' => [
                'rows' => '3',
                'class' => 'col-md-12',
                'maxlength' => 160,
                'placeholder' => 'Escriba aqui su mensaje'
            ]
        ]);
        ?>

        <?php
        echo $form->field($model, 'grupo_id')->widget(Select2::classname(), [
            'data' => \yii\helpers\ ArrayHelper::map(\app\models\Grupo::find()->all(), 'id', 'nombre'),
            'language' => 'es',
            'options' => ['placeholder' => 'Seleccione',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
        ?> 


        <div class="form-group">
            <center>       
                <?= Html::submitButton($model->isNewRecord ? 'Enviar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
            </center> 
        </div>

        <?php ActiveForm::end(); ?>

    </div>
                </div>
            </div>
        </div>
    <div class="col-md-3"></div>
</div>
    

