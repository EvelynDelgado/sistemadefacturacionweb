<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ContactoGrupo */

$this->title = 'Crear Contacto Grupo';
$this->params['breadcrumbs'][] = ['label' => 'Contacto Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="contacto-grupo-create">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>
                <?= $this->render('_form', [
                'model' => $model,
                ]) ?>
            </div>
        </div>

</div>
