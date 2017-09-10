<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Restablecer Clave';
$this->params['breadcrumbs'][] = $this->title;
?>
<center>

<div class="login-box">
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
     
        <div class="site-request-password-reset">
            <h2><?= Html::encode($this->title) ?></h2>

            <p>
            Por favor ingrese su correo electrónico, un enlace será enviado para que pueda restablecer su clave.    
            </p>

            <div class="row">
                <div class="col-md-12">
                    <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                    <?= $form->field($model, 'email') ?>

                    <div class="form-group">
                        <div class="col-xs-8" ></div>
                        <div class="col-xs-4">                          
                            <?= Html::submitButton('Enviar', ['class' => 'btn btn-primary',]) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>



        <a href="login" class="text-center">Ingresar al Sistema</a>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->


<script type="text/javascript">
/*
    function mensaje() {
        if (ValidaEmail($("#formulariosolicitudcambioclave-email").val()) == false)
        {
            alert('Ingrese un correo válido.');
            $("#formulariosolicitudcambioclave").focus();
            return false;
        } else {

            var email = document.getElementById("formulariosolicitudcambioclave-email").value;
            if (email == "") {
            }
            else {
                var confirmacion = confirm("¿Está seguro de que el correo ingresado es suyo?");
                if (confirmacion) {
                    alert("Revise su correo electrónico para obtener más instrucciones");
                }
            }
        }


        function ValidaEmail(email) {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            return regex.test(email);
        }


    }*/
</script>
</center>