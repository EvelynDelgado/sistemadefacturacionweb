<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ContactoGrupo */

$this->title = 'Contacto Grupo: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Contacto Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="contacto-grupo-view">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>



                <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                            'id',
            'contacto_id',
            'grupo_id',
                ],
                ]) ?>

                <center> 
                    <p>
                        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                        'confirm' => '¿Está seguro de que desea eliminar este item?',
                        'method' => 'post',
                        ],
                        ]) ?>
                    </p>
                </center> 
            </div>

        </div>

    </div>

