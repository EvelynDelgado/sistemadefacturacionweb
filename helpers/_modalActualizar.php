<?php

use yii\bootstrap\Modal
?>

<!--/*MODAL PARA ACTUALIZAR*/-->
<div class="ModalActualizar">
    <?php
    Modal::begin(['headerOptions' => ['id' => 'modalHeader'],
        'options' => [ 'id' => 'ModalFormularioActualizar', 'tabindex' => false],
        'header' => "<center><h3> Modificar Datos </h3> </center>",
        'size' => 'modal-lg',
        'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE],
    ]);
    echo "<div id='ResultadoAncualizar'></div>";
    Modal::end();
    ?>
</div>

