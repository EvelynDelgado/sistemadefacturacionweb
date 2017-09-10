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

    <div class="login-box">
        <div class="login-logo">
            Colegio Pierre Teilhard de Chadin

        </div>


     

    </div>
    <div class="login-box-body">
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
            <!-- /.col -->



        </div>


<?php ActiveForm::end(); ?>



        <div class="social-auth-links text-center">
          <!--  <p>- O -</p>-->



           
        </div>


        <a href="registro" class="text-center">Registrar</a><br>
        <a href="recuperarclave" class="text-center">Restablecer Clave</a><br>
        <a href="reenviar" class="text-center">Reenviar link de activación</a><br>

        <a href="../../../" class="text-center">Regresar</a>

    </div>


    <!-- /.login-box-body -->
</div><!-- /.login-box -->

