


<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Acceso al Sistema';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?> 


<div class="login-box">
    <div class="login-box-body">
        <center><h2> Sistema de facturación</h2></center>
        <center>
            <?php echo Html::img(Yii::$app->homeUrl . 'imagenes/logo.jpg', ['width' => '300', 'height' => '200', 'class' => 'user-image']); ?>
            </center>
        <p class="login-box-msg">Ingrese sus credenciales</p>
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>
        <?=
                $form
                ->field($model, 'username', $fieldOptions1)
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('Usuario')])
        ?>

        <?=
                $form
                ->field($model, 'password', $fieldOptions2)
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('Clave')])
        ?>

        <div class="row">
            <div class="col-xs-8" hidden>
                <?=
                        $form->field($model, 'rememberMe')
                        ->checkbox(['placeholder' => $model->getAttributeLabel('Recordarme')])
                ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-8" >

            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <!--<a href="recuperarclave" class="text-center">Restablecer Clave</a><br>-->
    </div>
</div>
