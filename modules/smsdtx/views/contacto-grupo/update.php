<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContactoGrupo */

$this->title = 'Modificar Contacto Grupo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contacto Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>

    <div class="contacto-grupo-update">   
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>


</div>
