<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Nueva Clave';
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="login-box">
    
    <!-- /.login-logo -->
    <div class="login-box-body">

<div class="site-reset-password">
    <h1>  All Techx </h1>
    <h2><?php Html::encode($this->title)?> </h2>

    <p>Por favor ingrese su nueva clave :</p>
    <div class="row">
        <div class="col-md-12">
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary','onclick'=>'mensaje()']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->

<script type="text/javascript">
    
    function mensaje() {
        alert("Por favor ingrese al sistema con su nueva clave");
    }
</script>
</center>