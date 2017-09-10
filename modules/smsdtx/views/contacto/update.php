<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contacto */

$this->title = 'Modificar Contacto: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>


<?=

$this->render('_form', [
    'model' => $model,
])
?>
