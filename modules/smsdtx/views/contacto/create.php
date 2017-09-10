<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Contacto */

$this->title = 'Crear Contacto';
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

   
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            