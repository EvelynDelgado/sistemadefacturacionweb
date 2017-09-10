<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\grid\CheckboxColumn;
use kartik\grid\RadioColumn;
use jlorente\remainingcharacters\RemainingCharacters;
$this->title = 'Enviar sms individual';
$this->params['breadcrumbs'][] = ['label' => 'Hostorial de sms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-6">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>



                <?=
                DetailView::widget([
                    'model' => $modelContacto,
                    'attributes' => [
                        'nombre',
                        'numero',
                        'correo',
                        'direccion',
                        'observacion:ntext',
                        [
                            'label' => 'Operadora',
                            'attribute' => 'operadora.nombre',
                        ]
                    ],
                ])
                ?>


            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">  </h3>
                <?php $form = ActiveForm::begin(); ?>
                <?=
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





