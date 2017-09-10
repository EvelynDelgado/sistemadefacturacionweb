<?php

namespace app\modules\smsdtx\controllers;

use Yii;
use app\models\Contacto;
use app\models\ContactoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ContactoController implementación de las acciones CRUD en base al modelo Contacto model.
 */
class ContactoController extends Controller {

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
                        'actions' => ['logout', 'index', 'view', 'create', 'update', 'delete'],
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
     * Lista todo el modelo Contacto.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ContactoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra un modelo Contacto basado en su valor de clave principal.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo modelo Contacto.
     * Si la creación se realiza correctamente, el navegador será redirigido a la página especificada.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Contacto();

        if ($model->load(Yii::$app->request->post())) {
            //$numeroIngresado = ;
            $numeroSinCero = substr($model->numero, 1);

            $numeroParaGuardar = '+593' . $numeroSinCero;
            //echo $numeroIngresado . '<br>';
            // echo $numeroParaGuardar;
            //die();
            $model->numero = $numeroParaGuardar;
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Actualiza el modelo Contacto basado en su valor de clave principal.
     * Si la actualización se realiza correctamente, el navegador será redirigido a la página especificada.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $numeroAntarior = $model->numero;
        if ($model->load(Yii::$app->request->post())) {

            $primerNumero = substr($model->numero, 0, 1);
            if ($primerNumero == "+") {
                $model->numero = $numeroAntarior;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
            $numeroSinCero = substr($model->numero, 1);
            $numeroParaGuardar = '+593' . $numeroSinCero;
            $model->numero = $numeroParaGuardar;
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Elimina el modelo Contacto basado en su valor de clave principal.
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
     * Busca el modelo Contacto basado en su valor de clave principal.
     * Si no se encuentra el modelo, se lanzará una excepción de 404 HTTP.
     * @param integer $id
     * @return Contacto retorna el modelo cargado
     * @throws NotFoundHttpException Excepción  Si el modelo no se puede encontrar
     */
    protected function findModel($id) {
        if (($model = Contacto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }

}
