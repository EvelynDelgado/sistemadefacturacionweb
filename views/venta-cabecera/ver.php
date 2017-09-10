<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\VentaCabecera */

$this->title = 'Venta Cabecera: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Venta Cabeceras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="venta-cabecera-view">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"> </h3>



            <?=
            DetailView::widget([
                'model' => $model,
                'attributes' => [
                 'numero_factura',
                    'fecha',
                    //'total',
                    //'subtotal',
                    //'iva',
                    'cliente.cedula',
                    'cliente.nombre',
                ],
            ])
            ?>

            <center>
                <p>

                    <?= Html::a('Modificar <span class=\'glyphicon glyphicon-edit\'></span>', ['modificar', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                    <?= Html::a("Regresar <span class='glyphicon glyphicon-arrow-left'></span>", ['index'], ['class' => 'btn btn-default']) ?>
                </p>
            </center>
        </div>

    </div>

</div>


<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">  </h3>

        <div class="venta-detalle-index">

            <?php // echo $this->render('_buscar', ['model' => $searchModel]);  ?>

            <p>
                <button type="button" class="btn btn-primary pull-rigth" data-toggle="modal" data-target="#crear-detalle-consulta">Agregar producto</button>
                <button type="button" class="btn btn-info pull-rigth" data-toggle="modal" data-target="#w6"><span class="glyphicon glyphicon-print"></span> Imprimir</button>
            </p>
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

                
                  [
                        'class' => 'kartik\grid\ActionColumn',
                        'header' => 'Action',
                        'headerOptions' => ['width' => '80'],
                        'template' => '{eliminar-prdcuto}',
                        'buttons' => [
                            'eliminar-prdcuto' => function($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['/venta-cabecera/eliminar-detalle', 'id' => $model->id], [
                                            'class' => '',
                                            'data' => [
                                                'confirm' => 'Seguro que desea eliminar el Item Seleccionado?',
                                                'method' => 'post',
                                            ],
                                ]);
                            },
                        ]
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
        </div>


    </div>
</div>

<?php
Modal::begin([
    'options' => [
        'tabindex' => false,
    ],
    // 'toggleButton' => ['label' => 'Agregar un Nuevo Detalle', 'class' => 'btn btn-primary pull-rigth'],
    'header' => '<h2>Productos</h2>',
    'id' => 'crear-detalle-consulta',
    'size' => 'modal-lg',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);

//  echo $this->render('_crearAlumno', [
echo $this->render('_formDetalle', [
    'model' => $modelDetalle,
    'idVentaCabecera' => $model->id,
// 'modelRepresentante' => $modelRepresentante,
]);

Modal::end();
?>



<?php

Modal::begin([
    'header' => '<h2>Impresión de Factura</h2>',
    'size' => 'modal-lg',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE],
   // 'toggleButton' => ['label' => '<span class="glyphicon glyphicon-print"></span>', 'class' => 'btn btn-primary pull-rigth'],
]);

echo \yii2assets\pdfjs\PdfJs::widget([
    'url' => Url::base() . '/venta-cabecera/imprimir?id='.$model->id,
]);

Modal::end();
?>
