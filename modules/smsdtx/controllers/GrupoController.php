<?php

namespace app\modules\smsdtx\controllers;

use Yii;
use app\models\Grupo;
use app\models\GrupoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\ContactoGrupoSearch;
use app\models\ContactoSearch;
use app\models\ContactoGrupo;
use yii\db\Exception;

/**
 * GrupoController implementación de las acciones CRUD en base al modelo Grupo model.
 */
class GrupoController extends Controller {

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
                        'actions' => ['logout', 'index', 'view',
                            'create', 'update', 'delete', 'grupo-asignacion', 'eliminar-del-grupo'
                        ],
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

    public function actionEliminarDelGrupo() {
        $id = Yii::$app->request->post('id');

        $model = ContactoGrupo::findOne($id);
        $model->delete();
    }

    public function actionGrupoAsignacion() {
        $grupo_id = Yii::$app->request->post('grupo_id');
        $contacto_id = Yii::$app->request->post('contacto_id');
        $comprobacionDuplicado = ContactoGrupo::find()->where(['contacto_id' => $contacto_id, 'grupo_id' => $grupo_id])->all();

        // print_r($comprobacionDuplicado);
        //die();
        if (empty($comprobacionDuplicado)) {
            $modelGrupoContacto = new ContactoGrupo;
            $modelGrupoContacto->contacto_id = $contacto_id;
            $modelGrupoContacto->grupo_id = $grupo_id;
            $modelGrupoContacto->save();
        }
        echo "ya";
    }

    /**
     * Lista todo el modelo Grupo.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new GrupoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra un modelo Grupo basado en su valor de clave principal.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {

        $model = $this->findModel($id);

        $searchModel = new ContactoGrupoSearch();
        $searchModel->grupo_id = $model->id;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = false;
        $searchModelContactos = new ContactoSearch();

        $dataProviderContactos = $searchModelContactos->search(Yii::$app->request->queryParams);
        

        return $this->render('view', [

                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'dataProviderContactos' => $dataProviderContactos,
                    'searchModelContactos' => $searchModelContactos,
                    'model' => $model,
        ]);
    }

    /**
     * Crea un nuevo modelo Grupo.
     * Si la creación se realiza correctamente, el navegador será redirigido a la página especificada.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Grupo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Actualiza el modelo Grupo basado en su valor de clave principal.
     * Si la actualización se realiza correctamente, el navegador será redirigido a la página especificada.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
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
     * Elimina el modelo Grupo basado en su valor de clave principal.
     * Si la eliminación se realiza correctamente, el navegador será redirigido a lapágina especificada.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {

        try {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
            throw new \Exception('Error!');
        } catch (\Exception $e) {
            Yii::$app->session->setFlash("error", "No se puede eliminar el ítem seleccionado,"
                    . "                     asegúrese de que no tenga datos relacionados,"
                    . "                      o que la información no se este utilizando en otro proceso");
            return $this->redirect(['index']);
        }
    }

    /**
     * Busca el modelo Grupo basado en su valor de clave principal.
     * Si no se encuentra el modelo, se lanzará una excepción de 404 HTTP.
     * @param integer $id
     * @return Grupo retorna el modelo cargado
     * @throws NotFoundHttpException Excepción  Si el modelo no se puede encontrar
     */
    protected function findModel($id) {
        if (($model = Grupo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }

}
