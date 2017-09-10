<?php

namespace app\controllers;

use Yii;
use app\models\Cliente;
use app\models\ClienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ClienteController implementación de las acciones CRUD en base al modelo Cliente model.
 */
class ClienteController extends Controller
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
* Lista todo el modelo Cliente.
* @return mixed
*/
    public function actionIndex()
    {
        $searchModel = new ClienteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

/**
* Muestra un modelo Cliente basado en su valor de clave principal.
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
* Crea un nuevo modelo Cliente.
* Si la creación se realiza correctamente, el navegador será redirigido a la página especificada.
* @return mixed
*/
    public function actionCrear()
    {
        $model = new Cliente();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['ver', 'id' => $model->id]);
        } else {
            return $this->render('crear', [
                'model' => $model,
            ]);
        }
    }

/**
* Actualiza el modelo Cliente basado en su valor de clave principal.
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
* Elimina el modelo Cliente basado en su valor de clave principal.
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
* Busca el modelo Cliente basado en su valor de clave principal.
* Si no se encuentra el modelo, se lanzará una excepción de 404 HTTP.
* @param integer $id
* @return Cliente retorna el modelo cargado
* @throws NotFoundHttpException Excepción  Si el modelo no se puede encontrar
*/
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }
}
