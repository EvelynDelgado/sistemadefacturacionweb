<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use jlorente\remainingcharacters\RemainingCharacters;

/* @var $this yii\web\View */
/* @var $model app\models\Contacto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12">


    <?php $form = ActiveForm::begin(); ?>



    <div class="col-md-6">
        <div class="contacto-create">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

                    <?=
                    $form->field($model, 'numero')->widget(RemainingCharacters::classname(), [
                        'type' => RemainingCharacters::INPUT_TEXT,
                        'text' => '{n} caracteres restantes',
                        'label' => [
                            'tag' => 'p',
                            'id' => 'my-counter',
                            'class' => 'counter',
                            'invalidClass' => 'error'
                        ],
                        'options' => [
                            'rows' => '1',
                            'class' => 'col-md-12',
                            'maxlength' => 10,
                            'placeholder' => 'Ejemplo: 0989280204'
                        ]
                    ]);
                    ?>



                    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="contacto-create">
            <div class="box box-primary">
                <div class="box-header with-border">

                    <?php
                    echo $form->field($model, 'operadora_id')->widget(Select2::classname(), [
                        'data' => \yii\helpers\ ArrayHelper::map(\app\models\Operadora::find()->all(), 'id', 'nombre'),
                        'language' => 'es',
                        'options' => ['placeholder' => 'Seleccione',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?> 
                    <?= $form->field($model, 'observacion')->textarea(['rows' => 5]) ?>

                </div>
            </div>
        </div>
    </div>






    <div class="form-group">
        <center>       
            <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
        </center> 
    </div>

    <?php ActiveForm::end(); ?>

</div>


