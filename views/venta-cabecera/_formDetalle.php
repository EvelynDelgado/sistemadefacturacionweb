<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\VentaDetalle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title"> </h3>
        <div class="venta-detalle-form">

            <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'venta_cabecera_id')->hiddenInput(['value' => $idVentaCabecera])->label(FALSE) ?>

            <div class='col-md-12'>
                <?php
                echo $form->field($model, 'producto_id')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\app\models\Producto::find()->all(), 'id', 'nombreCategoria'),
                    'language' => 'es',
                    'options' => ['placeholder' => 'Seleccione',
                    ],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>

            </div><div class='col-md-6'> <?= $form->field($model, 'cantidad')->textInput() ?>

            </div><div class='col-md-6'> <?= $form->field($model, 'iva')->textInput(['maxlength' => true]) ?>


            </div>                <center>
                <div class="form-group">
<?= Html::submitButton('Guardar <span class=\'glyphicon glyphicon-floppy-disk\'></span>', ['class' => 'btn btn-primary']) ?>
                </div>
            </center>

<?php ActiveForm::end(); ?>

        </div>

    </div>
</div>