<?php

namespace app\modules\smsdtx\controllers;

use Yii;
use app\models\ContactoGrupo;
use app\models\ContactoGrupoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ContactoGrupoController implementación de las acciones CRUD en base al modelo ContactoGrupo model.
 */
class ContactoGrupoController extends Controller
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
                        'actions' => ['logout', 'index', 'view', 'create', 'update','delete'],
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
* Lista todo el modelo ContactoGrupo.
* @return mixed
*/
    public function actionIndex()
    {
        $searchModel = new ContactoGrupoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

/**
* Muestra un modelo ContactoGrupo basado en su valor de clave principal.
* @param integer $id
* @return mixed
*/
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

/**
* Crea un nuevo modelo ContactoGrupo.
* Si la creación se realiza correctamente, el navegador será redirigido a la página especificada.
* @return mixed
*/
    public function actionCreate()
    {
        $model = new ContactoGrupo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

/**
* Actualiza el modelo ContactoGrupo basado en su valor de clave principal.
* Si la actualización se realiza correctamente, el navegador será redirigido a la página especificada.
* @param integer $id
* @return mixed
*/
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

/**
* Elimina el modelo ContactoGrupo basado en su valor de clave principal.
* Si la eliminación se realiza correctamente, el navegador será redirigido a lapágina especificada.
* @param integer $id
* @return mixed
*/
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

/**
* Busca el modelo ContactoGrupo basado en su valor de clave principal.
* Si no se encuentra el modelo, se lanzará una excepción de 404 HTTP.
* @param integer $id
* @return ContactoGrupo retorna el modelo cargado
* @throws NotFoundHttpException Excepción  Si el modelo no se puede encontrar
*/
    protected function findModel($id)
    {
        if (($model = ContactoGrupo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }
}
