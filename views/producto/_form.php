<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;



/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="col-md-12">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> </h3>
            <div class="producto-form">

                
                <?php $form = ActiveForm::begin(); ?>
                <div class="col-md-6">
                    <?php
                   echo $form->field($model, 'categoria_id')->widget(Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\app\models\Categoria::find()->all(), 'id', 'nombre'),
                        'language' => 'es',
                        'options' => ['placeholder' => 'Seleccione',
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ]);
                    ?>


                    <?php
                    /*
                      '<label class="control-label">Categoría</label>';

                      Html::activeDropDownList($model, 'categoria_id', ArrayHelper::map(\app\models\Categoria::find()->all(), 'id', 'nombre'), ['prompt' => 'Seleccione...', 'class' => 'form-control', 'onchange' => 'function()']) */
                    ?> 
                    


                    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
                     <?= $form->field($model, 'precio')->textInput(['maxlength' => true]) ?>


                     <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>


                    



                </div>



                <div class="col-md-6">
                    <?php
                    echo $form->field($model, '_image')->widget(\bilginnet\cropper\Cropper::className(), [
                        'cropperOptions' => [
                            'width' => 576, // must be specified
                            'height' => 768, // must be specified
                            'preview' => [
                                'url' => '@web/' . $model->imagen, // set in update action // (!$model->isNewRecord) ? Yii::getAlias('@uploadUrl/$model->image') : ''
                                'width' => 250, // default 100 // default is cropperWidth if cropperWidth < 100
                                'height' => 300, // Will calculate automatically by aspect ratio if not set
                            ],
                            'icons' => [
                                'browse' => '<i class="fa fa-image"></i>',
                                'crop' => '<i class="fa fa-crop"></i>',
                                'close' => '<i class="fa fa-crop"></i>',
                            ]
                        ],
                        'label' => 'Seleccionar Imagen',
                    ]);
                    ?> 
                </div>


                <center>
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
