<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="usuario-index">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <p>
                <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nombre',
                    'celular',
                    'username',
                    'email:email',
                    // 'foto',
                    // 'auth_key',
                    //'password_hash',
                    // 'password_reset_token',
                    // 'estado',
                    // 'fecha_creacion',
                    // 'fecha_actualizacion',
                    // 'tipo_usuario',
                    // 'token',
                    // 'id_facebook',
                    // 'nombre',
                    // 'celular',
                    // 'empresa_id',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>


    </div>
</div>