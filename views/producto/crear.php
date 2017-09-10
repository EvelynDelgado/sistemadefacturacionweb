<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = 'Crear Producto';
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="producto-crear">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>
