<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="cliente-index">

                                <?php // echo $this->render('_buscar', ['model' => $searchModel]); ?>
            
            <p>
                <?= Html::a('Crear Cliente <span class=\'glyphicon glyphicon-plus\'></span>', ['crear'], ['class' => 'btn btn-success']) ?>
            </p>
                                        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'cedula',
            'nombre',
            'direccion',
            'celular',
            // 'obervacion:ntext',

                [
                'header' => 'Acciones',
                'class' => app\helpers\vistas\botonesPersonalizados::className(),
                ],
                ],
                ]); ?>
                                </div>


    </div>
</div>