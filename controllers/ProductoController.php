<?php

namespace app\controllers;

use Yii;
use app\models\Producto;
use app\models\ProductoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProductoController implementación de las acciones CRUD en base al modelo Producto model.
 */
class ProductoController extends Controller
{
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
                        'actions' => ['logout', 'index', 'ver', 'crear', 'modificar','eliminar'],
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
* Lista todo el modelo Producto.
* @return mixed
*/
    public function actionIndex()
    {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

/**
* Muestra un modelo Producto basado en su valor de clave principal.
* @param integer $id
* @return mixed
*/
    public function actionVer($id)
    {
        return $this->render('ver', [
            'model' => $this->findModel($id),
        ]);
    }

/**
* Crea un nuevo modelo Producto.
* Si la creación se realiza correctamente, el navegador será redirigido a la página especificada.
* @return mixed
*/
    public function actionCrear()
    {
        $model = new Producto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ver', 'id' => $model->id]);
        } else {
            return $this->render('crear', [
                'model' => $model,
            ]);
        }
    }

/**
* Actualiza el modelo Producto basado en su valor de clave principal.
* Si la actualización se realiza correctamente, el navegador será redirigido a la página especificada.
* @param integer $id
* @return mixed
*/
    public function actionModificar($id)
    {
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
* Elimina el modelo Producto basado en su valor de clave principal.
* Si la eliminación se realiza correctamente, el navegador será redirigido a lapágina especificada.
* @param integer $id
* @return mixed
*/
    public function actionEliminar($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

/**
* Busca el modelo Producto basado en su valor de clave principal.
* Si no se encuentra el modelo, se lanzará una excepción de 404 HTTP.
* @param integer $id
* @return Producto retorna el modelo cargado
* @throws NotFoundHttpException Excepción  Si el modelo no se puede encontrar
*/
    protected function findModel($id)
    {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }
}
