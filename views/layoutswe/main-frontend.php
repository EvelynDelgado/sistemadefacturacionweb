<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\FrontendAppAsset;
use kartik\social\FacebookPlugin;
use dmstr\widgets\Alert;

FrontendAppAsset::register($this);
$informacionGeneral = \app\models\General::find()->select(['contacto', 'direccion', 'correo', 'facebook', 'twitter', 'youtube', 'google_plus'])->one();
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
       
        <meta name="keywords" content="Unidad Educativa Particular John Pierre del Hierro Melchiade, Educación, Melchiade, Religión, Particular, Alcance, Mejor, Futuro, Ahorro, Noticias, Ecuador, Manabí, Montecristi" />
        <meta name="description" content="Unidad Educativa Particular John Pierre del Hierro Melchiade forma hombres y mujeres líderes con principios y valores cristianos" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:title" content="Aquí encontrará toda la información que usted necesita de nuestra institución Unidad Educativa Particular John Pierre del Hierro Melchiade" />
    <meta property="og:site_name" content="uejohnpierredelHierro Melchiade.edu.ec"/>
    <meta property="og:url" content="http://www.uejohnpierredelHierro Melchiade.edu.ec/" />
    <meta property="og:description" content="Aquí encontrará toda la información que usted necesita de nuestra institución Unidad Educativa Particular John Pierre del Hierro Melchiade" /> 
    <meta property="article:author" content="https://www.facebook.com/JPH.edu.ec/" />
    <meta property="article:publisher" content="https://www.facebook.com/JPH.edu.ec/" />

        <?= Html::csrfMetaTags() ?>
        <title><?= ($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody() ?>
    <body>
        <header>
            <div class="top-wrapper hidden-xs">
                <div class="container">
                    <div class="col-md-4 col-sm-6 hidden-xs top-wraper-left no-padding">
                        <ul class="header-social-icons">
                            <?php if (!empty($informacionGeneral->facebook)) { ?>
                                <li class="facebook"><a href="<?= $informacionGeneral->facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <?php } ?>
                            <?php if (!empty($informacionGeneral->twitter)) { ?>
                                <li class="twitter"><a href="<?= $informacionGeneral->twitter ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <?php } ?>
                            <?php if (!empty($informacionGeneral->google_plus)) { ?>
                                <li class="google-plus"><a href="<?= $informacionGeneral->google_plus ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                            <?php } ?>
                            <?php if (!empty($informacionGeneral->youtube)) { ?>
                                <li class="youtube"><a href="<?= $informacionGeneral->youtube ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-md-8 col-sm-6">
                        <ul class="top-right pull-right ">
                            <?php if (Yii::$app->user->isGuest) { ?>                                
                                <li class="login"><a href="<?php echo Yii::$app->request->baseUrl ?>/noticias/noticia"><i class="fa fa-lock"></i>Ingresar al Sistema</a>
                                </li>
                            <?php } else { ?>
                                <li><a href="<?php echo Yii::$app->request->baseUrl; ?>/noticias/noticia">Administrar</a></li>
                                <li><a  href="<?php echo Yii::$app->request->baseUrl; ?>/site/logout" data-method="post">   Salir(<?php echo Yii::$app->user->identity->username ?>)</a></li>
                            <?php } ?>                               
                        </ul>
                    </div>
                </div>


            </div>

<div><div id="rojo"></div></div>


            <div class="logo-bar hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4"><a href="<?php echo Yii::$app->request->baseUrl ?>/"> 
                                <?= Html::img('@web/imagenes/logo.png'); ?></a> </div>
                        <div class="col-sm-8">
                            <ul class="contact-info pull-right">
                                <li><i class="fa fa-phone"></i>
                                    <p> <span>Llamar</span><br>
                                        <?php echo $informacionGeneral->contacto ?></p>
                                </li>
                                <li><i class="fa fa-envelope"></i>
                                    <p><span>Correo</span><br>
                                        <a href="mailto:<?php echo $informacionGeneral->correo ?>">
                                            <?php echo $informacionGeneral->correo ?>
                                        </a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wow fadeInDown navigation affix" data-offset-top="197" data-spy="affix" style="visibility: visible;">
               
                <div class="container">

                

                    <nav class="navbar navbar-default">
                        <div class="row">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                                <a class="navbar-brand" href="<?php echo Yii::$app->request->baseUrl ?>/">
                                    <?php
                                        if (\Yii::$app->devicedetect->isMobile()) {
                                     echo Html::img('@web/imagenes/logomovil.png'); 
                                        }else{
                                          echo  Html::img('@web/imagenes/logo.png'); 
                                        }

                                     ?>    
                                </a> </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="<?php echo Yii::$app->request->baseUrl ?>/">Inicio</a></li>
                                    <li><a href="<?php echo Yii::$app->request->baseUrl ?>/noticia">Noticias</a></li>
                                    <li><a href="<?php echo Yii::$app->request->baseUrl ?>/site/oferta-educativa">Oferta educativa </a></li>
                                    <li><a href="<?php echo Yii::$app->request->baseUrl ?>/site/quienes-somos">¿Quiénes somos?</a></li>
                                    <li><a href="<?php echo Yii::$app->request->baseUrl ?>/site/historia">Reseña Historica </a></li>
                                    <li><a href="<?php echo Yii::$app->request->baseUrl ?>/site/galeria">Galería</a></li>
                                    <li><a href="<?php echo Yii::$app->request->baseUrl ?>/site/contacto">Formulario de contacto</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        <div class="container">
        </div>
        <div class="col-md-12">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
        <footer>        
            <div class="col-md-12">
                <div class="col-sm-4">
                    <?php
                    $fb = $informacionGeneral->facebook;
                    echo FacebookPlugin::widget(['type' => FacebookPlugin::PAGE, 'settings' => ['href' => $fb, "width" => "360"]]);
                    ?></div>
                <div class="col-md-4">
                    <div class="contactus">
                        <h2>Contactos</h2>
                        <ul class="list-ul">
                            <li><i class="fa fa-map-marker"></i><?php echo $informacionGeneral->direccion ?></li>
                            <li><i class="fa fa-phone"></i><?php echo $informacionGeneral->contacto ?></li>
                            <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo $informacionGeneral->correo ?>"><?php echo $informacionGeneral->correo ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php echo $this->render('../noticia/_categoria'); ?>  
                </div>
            </div>
        </footer>
        <div class="footer-wrapper">
            <div class="container">
                <p>© Copyright 
                    <script type="text/javascript">
                        var d = new Date();
                        document.write(d.getFullYear());
                    </script>
                   Unidad Educativa Particular "John Pierre Del Hierro  Melchiade" Todos los derechos reservados.<br><b>Desarrollado por:</b>
                    <a target="_black" href="http://www.designtechx.com/home/" >DesignTechx S.A </a>
                </p>
            </div>
            <a id="scrool-top" href="javascript:void(0)"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></a> 
        </div>
    </body>
    <?php $this->endBody() ?>
    <?php $this->endPage() ?>


<style type="text/css">div #rojo {
    color: #cc0000;
    background-color: #cc0000;
    height: 6px;
    }

    </style>