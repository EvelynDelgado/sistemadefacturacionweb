<?php

use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Sistema de Facturación';

?>
<hr>

<div class="gestion-default-index">
    <div class="col-md-12">
        <div class="col-md-3">
            <div class="paciente-create">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <center><h3 class="box-title">  Administrar Clientes</h3></center>

                        <a href="<?php echo Url::to(["/cliente/index"]) ?>" type="button" class="btn btn-default btn-block btn-flat">
                            <center>
                                <?= Html::img('@web/imagenes/menu/pacientes.png', ['width' => '160', 'height' => '160',]); ?>
                            </center>

                        </a>

                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div class="paciente-create">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <center><h3 class="box-title"> Lista de ventas  </h3></center>
                        <a href="<?php echo Url::to(["/venta-cabecera/index"]) ?>" type="button" class="btn btn-default btn-block btn-flat">
                            <center>
                                <?= Html::img('@web/imagenes/menu/historial.png', ['width' => '160', 'height' => '160',]); ?>
                            </center>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-3">
            <div class="paciente-create">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <center><h3 class="box-title"> Crear Venta </h3></center>
                        <a href="<?php echo Url::to(["/venta-cabecera/crear"]) ?>" type="button" class="btn btn-default btn-block btn-flat">
                            <center>
                                <?= Html::img('@web/imagenes/menu/ficha.png', ['width' => '160', 'height' => '160',]); ?>
                            </center>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
