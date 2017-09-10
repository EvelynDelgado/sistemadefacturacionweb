<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Grupo */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Grupos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-6">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">  Lista de Contactos</h3> <hr>
                <div class="contacto-index">
                    <?=
                    GridView::widget([
                        'dataProvider' => $dataProviderContactos,
                        'filterModel' => $searchModelContactos,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'nombre',
                            'numero',
                            ['class' => 'yii\grid\ActionColumn',
                                'template' => '{asignar}',
                                'buttons' => [
                                    'asignar' => function ($url, $model) {
                                        $key = $model->id;
                                        return "<a class='btn btn-primary' type='button' onclick='Pasar($key)' > <span class='glyphicon glyphicon-chevron-right'></span></a>";
                                    }
                                ]
                            ],
                        //          'correo',
//            'direccion',
                        // 'observacion:ntext',
                        // 'operadora_id',
                        // ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]);
                    ?>
                </div>


            </div>
        </div>
    </div>
    <div class="col-md-6">

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Contactos Asignados a <?php echo $model->nombre ?></h3> <hr>
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        //'id',
                        [
                            'attribute' => 'Nombre',
                            'value' => 'contacto.nombre'
                        ],
                        [
                            'label' => 'Número',
                            'value' => 'contacto.numero'
                        ],
                        ['class' => 'yii\grid\ActionColumn',
                            'template' => '{asignar}',
                            'buttons' => [
                                'asignar' => function ($url, $model) {
                                    $key = $model->id;
                                    return "<a class='btn btn-danger' type='button' onclick='Quitar($key)' > <span class='glyphicon glyphicon-remove'></span></a>";
                                }
                            ]
                        ],
                    //'contacto_id',
                    //  'grupo_id',
                    //    ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]);
                ?>
            </div>


        </div>
    </div>
</div>



<script>
    function Pasar(id)
    {
        // alert(id);
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl . '/smsdtx/grupo/grupo-asignacion' ?>',
            type: 'post',
            data: {contacto_id: id, grupo_id: '<?php echo $model->id; ?>'},
            success: function (data)
            {
                location.reload();
            }

        });
    }
     function Quitar(id)
    {
       // alert(id);
        $.ajax({
            url: '<?php echo Yii::$app->request->baseUrl . '/smsdtx/grupo/eliminar-del-grupo' ?>',
            type: 'post',
            data: {id: id },
            success: function (data)
            {
                location.reload();
            }

        });
    }
</script>
