tipo_usuario<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */

$this->title = 'Usuario: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="usuario-view">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> </h3>



                <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                            'id',
            'username',
            'foto',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            'estado',
            'fecha_creacion',
            'fecha_actualizacion',
            'token',
            'nombre',
            'celular',
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

