<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $modelPerfilUsuario backend\modelPerfilUsuarios\Usuario */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'Perfil';
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <center>
                        <h3 class="box-title"> Perfil </h3>
                        <?php
                        echo Html::img('@web/imagenes/usuarios/0.png', ['width' => '160', 'height' => '160', 'class' => 'user-image']);
                        ?>
                    </center>
                    <h3 class="profile-username text-center">
                        <strong> <?php echo Yii::$app->user->identity->username; ?></strong>
                    </h3>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <strong><i class="fa fa-user margin-r-5"></i> Usuario</strong> <div class="pull-right"><?php echo Yii::$app->user->identity->username; ?> </div>
                        </li>

                        <li class="list-group-item">
                            <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong> <div class="pull-right"><?php echo Yii::$app->user->identity->email; ?> </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>





        <div class="col-md-4">
            <div class="box box-primary">
                <center> <h3 class="box-title">Datos de Perfil </h3>
                </center>
                <div class="box-body box-profile">
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

                    <div class="col-md-12">
                        <p>                             
                            <?= $form->field($modelPerfilUsuario, 'username')->textInput(['maxlength' => true, 'readOnly' => true]) ?>  

                        </p>
                        <p>                             
                            <?= $form->field($modelPerfilUsuario, 'nombre')->textInput(['maxlength' => true,]) ?>  

                        </p>

                        <p> 
                            <?= $form->field($modelPerfilUsuario, 'email')->textInput(['maxlength' => true]) ?>  
                        </p>
                        <?php
                        $form->field($modelPerfilUsuario, 'file')->widget(FileInput::classname(['showUpload' => false]), [
                            'options' => ['accept' => 'image/*'],
                            'pluginOptions' => [
                                'showCaption' => false,
                                'showRemove' => false,
                                'showUpload' => false,
                                'browseClass' => 'btn btn-default btn-block',
                                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                'browseLabel' => 'Seleccionar Imagen',
                                'allowedFileExtensions' => ['png', 'jpg'],
                                'maxFileSize' => '1024*1024',
                                /* 'showPreview' => false,
                                  'showCaption' => true,
                                  'showRemove' => false,
                                  'showUpload' => false, */
                                'language' => 'es',
                            ],
                        ]);
                        ?>

                        <center>
                            <div class="form-group">
                                <hr>
                                <?= Html::submitButton($modelPerfilUsuario->isNewRecord ? ' Guardar' : 'Guardar', ['class' => $modelPerfilUsuario->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </center>

                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <center><h3 class="box-title"> Cambio de Clave </h3></center>
                    <div class="col-md-12">
                        <?=
                        $this->render(
                                'changepassword', [
                            'model' => $model
                                ]
                        )
                        ?>

                    </div>
                </div>
            </div>
        </div>
