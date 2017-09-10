<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VentaDetalleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Venta Detalles';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="venta-detalle-index">

                                <?php // echo $this->render('_buscar', ['model' => $searchModel]); ?>
            
            <p>
                <?= Html::a('Crear Venta Detalle <span class=\'glyphicon glyphicon-plus\'></span>', ['crear'], ['class' => 'btn btn-primary']) ?>
            </p>
                                        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                            'id',
            'venta_cabecera_id',
            'producto_id',
            'cantidad',
            'precio',
            // 'subtotal',
            // 'total',

                [
                'header' => 'Acciones',
                'class' => app\helpers\vistas\botonesPersonalizados::className(),
                ],
                ],
                ]); ?>
                                </div>


    </div>
</div>