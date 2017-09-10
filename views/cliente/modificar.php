<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Modificar Cliente: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['ver', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>

<div class="cliente-modificar">   

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
