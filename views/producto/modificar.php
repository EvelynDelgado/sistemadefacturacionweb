<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = 'Modificar Producto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['ver', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>

<div class="producto-modificar">   

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
