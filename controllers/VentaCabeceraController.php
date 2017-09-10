<?php

namespace app\controllers;

use Yii;
use app\models\VentaCabecera;
use app\models\VentaCabeceraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use kartik\mpdf\Pdf;
/**
 * VentaCabeceraController implementación de las acciones CRUD en base al modelo VentaCabecera model.
 */
class VentaCabeceraController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                        [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                        [
                        'actions' => ['logout', 'imprimir','index', 'ver', 'crear', 'modificar', 'eliminar','eliminar-detalle'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lista todo el modelo VentaCabecera.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new VentaCabeceraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }
  public function actionImprimir($id) {

      //  $modelDetalle = new \app\models\VentaDetalle;
        $model = $this->findModel($id);
        $searchModel = new \app\models\VentaDetalleSearch();
        $searchModel->venta_cabecera_id = $model->id;
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = false;
        /*   return $this->render('imprimir', [
          'model' => $model,
          ]);
         */

        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        Yii::$app->response->headers->add('Content-Type', 'application/pdf');

        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'content' => $this->renderPartial('imprimir', [
                'model' => $model,
                'searchModel'=>$searchModel,
                'dataProvider'=>$dataProvider,
            ]),
            'options' => [
                'title' => 'Sistema de Facturación',
                'subject' => 'Historial Clínico - ' . $model->id,
            ],
            'methods' => [
                'SetHeader' => ['Sistema de Facturación'],
                'SetFooter' => ['|Página {PAGENO}|  '],
            ]
        ]);
        return $pdf->render();
    }
    
    /**
     * Muestra un modelo VentaCabecera basado en su valor de clave principal.
     * @param integer $id
     * @return mixed
     */
    public function actionVer($id) {
        $modelDetalle = new \app\models\VentaDetalle;
        $model = $this->findModel($id);
        $searchModel = new \app\models\VentaDetalleSearch();
        $searchModel->venta_cabecera_id = $model->id;
        
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->sort = false;

        if ($modelDetalle->load(Yii::$app->request->post())) {
            $producto = \app\models\Producto::findOne($modelDetalle->producto_id);
            $precio = $producto->precio;
            $subTotal = $modelDetalle->cantidad * $precio;
           $iva = ($subTotal * $modelDetalle->iva) / 100;
           $modelDetalle->valor_iva= $iva;
           $modelDetalle->precio=$precio;
            $modelDetalle->subtotal = $subTotal;
            $modelDetalle->total = $subTotal + $iva;
            $modelDetalle->save();
            return $this->redirect(['ver', 'id' => $model->id]);
        }

        return $this->render('ver', [
                    'model' => $model,
                    'dataProvider' => $dataProvider,
                    'modelDetalle' => $modelDetalle,
        ]);
    }

    /**
     * Crea un nuevo modelo VentaCabecera.
     * Si la creación se realiza correctamente, el navegador será redirigido a la página especificada.
     * @return mixed
     */
    public function actionCrear() {
        $model = new VentaCabecera();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ver', 'id' => $model->id]);
        } else {
            return $this->render('crear', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Actualiza el modelo VentaCabecera basado en su valor de clave principal.
     * Si la actualización se realiza correctamente, el navegador será redirigido a la página especificada.
     * @param integer $id
     * @return mixed
     */
    public function actionModificar($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ver', 'id' => $model->id]);
        } else {
            return $this->render('modificar', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Elimina el modelo VentaCabecera basado en su valor de clave principal.
     * Si la eliminación se realiza correctamente, el navegador será redirigido a lapágina especificada.
     * @param integer $id
     * @return mixed
     */
    public function actionEliminarDetalle($id) {
        
$model = \app\models\VentaDetalle::findOne($id);
$model->delete();
 return $this->redirect(['ver', 'id' => $model->venta_cabecera_id]);
        
    }

     public function actionEliminar($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /**
     * Busca el modelo VentaCabecera basado en su valor de clave principal.
     * Si no se encuentra el modelo, se lanzará una excepción de 404 HTTP.
     * @param integer $id
     * @return VentaCabecera retorna el modelo cargado
     * @throws NotFoundHttpException Excepción  Si el modelo no se puede encontrar
     */
    protected function findModel($id) {
        if (($model = VentaCabecera::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }

}
