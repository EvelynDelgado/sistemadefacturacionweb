<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\datecontrol\DateControl;
/* @var $this yii\web\View */
/* @var $model app\models\VentaCabecera */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> </h3>
            <div class="venta-cabecera-form">

                <?php $form = ActiveForm::begin(); ?>

<div class='col-md-12'> <?= $form->field($model, 'numero_factura')->textInput() ?>
</div>
                <div class='col-md-12'> 
                <?php
                echo $form->field($model, 'fecha')->widget(DateControl::classname(), [
                    'type' => DateControl::FORMAT_DATE,
                    'ajaxConversion' => false,
                    'displayFormat' => 'php:d-F-Y',
                    'options' => [
                        'pluginOptions' => [
                            'autoclose' => true,
                            // 'format' => 'mm/dd/yyyy'
                            'format' => 'php:d-F-Y'
                        ]
                    ]
                ]);
                ?> 
                </div>
                <div class='col-md-12'>
                    <?php
                    echo $form->field($model, 'cliente_id')->widget(Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\app\models\Cliente::find()->all(), 'id', 'cedulaNombre'),
                        'language' => 'es',
                        'options' => ['placeholder' => 'Seleccione',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>
                </div>                <center>
                    <div class="form-group">
                        <?= Html::submitButton('Guardar <span class=\'glyphicon glyphicon-floppy-disk\'></span>', ['class' => 'btn btn-primary']) ?>
                        <?= Html::a("Cancelar <span class='glyphicon glyphicon-ban-circle'></span>", ['index'], ['class' => 'btn btn-default']) ?>
                    </div>
                </center>

                <?php ActiveForm::end(); ?>

            </div>

        </div>
    </div>
</div>

<div class="col-md-3"></div>