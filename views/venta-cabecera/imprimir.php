<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\VentaCabecera */

$this->title = 'Venta Cabecera: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Venta Cabeceras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>



  <h1 align="center"><font color="blue" ><i><B> ARTEC<B/></i></h1><font/>
<div align="center"><font  color="blue" ><B> BRAVO COBEÑA LUIS HUMBERTO<br> MANTENIMI ENTO Y REPARACIÓN DE 
MAQUINARIA DE <br>INFORMATICA Y EQUIPOS PERIFERICOS INSTALACIÓN, <br>MANTENIMIENTO Y REPARACIÓN DE SISTEMAS ELÉCTRICOS.  
<B/><font/><br>
<div align="center"><font  color="blue" >R. U. C.: 1312315516001<br>  
Dirección: Ciudadela La Pradera Calle Principal s/ n – Telf: 0948536927 <br>Manta – Manabí - Ecuador <br> <br>  
<div align="right"><font  color="black" ><b> N#.Autorizacion 001.001.00034<b/>


<br><br><br>


<p> <b>Factura :</b> <?php echo $model->numero_factura ?> <p>
<p> <b>Cédula:</b> <?php echo $model->cliente->cedula ?> <p>
<p> <b>Cliente:</b> <?php echo $model->cliente->nombre ?> <p>
<p> <b>Feha:</b> <?php echo $model->fecha ?> <p>




            <?php
            $gridColumns = [
            [
            'class' => 'kartik\grid\SerialColumn',
            'contentOptions' => ['class' => 'kartik-sheet-style'],
            'width' => '36px',
            'header' => 'No',
            'headerOptions' => ['class' => 'kartik-sheet-style']
            ],
                //     'id',
                //  'venta_cabecera_id',
                // 'producto_id',
            [
            'attribute' => 'Producto',
            'value' => 'producto.nombre',
            ],
            'cantidad',
            'precio',
            'iva',
                //  'subtotal',
                //  'valor_iva',
                //  'total',
            [
            'attribute' => 'subtotal',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '7%',
            'format' => ['decimal', 2],
            'pageSummary' => true
            ],
            [
            'attribute' => 'valor_iva',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '7%',
            'format' => ['decimal', 2],
            'pageSummary' => true
            ],
            [
            'attribute' => 'total',
            'vAlign' => 'middle',
            'hAlign' => 'right',
            'width' => '7%',
            'format' => ['decimal', 2],
            'pageSummary' => true
            ],




            ];
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',
                //'filterModel'=>$searchModel,
                'columns' => $gridColumns,
                'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
                'headerRowOptions' => ['class' => 'kartik-sheet-style'],
                'filterRowOptions' => ['class' => 'kartik-sheet-style'],
                'pjax' => true, // pjax is set to always true for this demo
                'toolbar' => [
                    // '{export}',
                '{toggleData}',
                ],
                'export' => [
                'fontAwesome' => true
                ],
                'bordered' => TRUE,
                'striped' => TRUE,
                'condensed' => TRUE,
                'responsive' => TRUE,
                'hover' => TRUE,
                'showPageSummary' => TRUE,
                ]);
                ?>