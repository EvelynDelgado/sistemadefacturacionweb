<?php

namespace app\controllers;

use Yii;
use app\models\Categoria;
use app\models\CategoriaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CategoriaController implementación de las acciones CRUD en base al modelo Categoria model.
 */
class CategoriaController extends Controller
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
* Lista todo el modelo Categoria.
* @return mixed
*/
    public function actionIndex()
    {
        $searchModel = new CategoriaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

/**
* Muestra un modelo Categoria basado en su valor de clave principal.
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
* Crea un nuevo modelo Categoria.
* Si la creación se realiza correctamente, el navegador será redirigido a la página especificada.
* @return mixed
*/
    public function actionCrear()
    {
        $model = new Categoria();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ver', 'id' => $model->id]);
        } else {
            return $this->render('crear', [
                'model' => $model,
            ]);
        }
    }

/**
* Actualiza el modelo Categoria basado en su valor de clave principal.
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
* Elimina el modelo Categoria basado en su valor de clave principal.
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
* Busca el modelo Categoria basado en su valor de clave principal.
* Si no se encuentra el modelo, se lanzará una excepción de 404 HTTP.
* @param integer $id
* @return Categoria retorna el modelo cargado
* @throws NotFoundHttpException Excepción  Si el modelo no se puede encontrar
*/
    protected function findModel($id)
    {
        if (($model = Categoria::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }
}
