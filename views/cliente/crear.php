<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = 'Crear Cliente';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="cliente-crear">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>
</div>
