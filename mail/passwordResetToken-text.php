<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/resetearclave', 'token' => $user->password_reset_token]);
?>
Hola <?= $user->username ?>,

<p>Siga el siguiente enlace para restablecer la clave:</p>

<?= $resetLink ?>
