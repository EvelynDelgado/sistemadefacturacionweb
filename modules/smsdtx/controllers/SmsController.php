<?php

namespace app\modules\smsdtx\controllers;

use Yii;
use app\models\Sms;
use app\models\SmsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\ContactoSearch;
use app\models\Contacto;
use app\models\ContactoGrupo;

/**
 * SmsController implementación de las acciones CRUD en base al modelo Sms model.
 */
class SmsController extends Controller {

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
                        'actions' => ['logout', 'index', 'view', 'create', 'update', 'delete',
                            'sms-grupal', 'sms-individual'],
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
     * Lista todo el modelo Sms.
     * @return mixed
     */
    public function actionSmsGrupal() {
        $model = new Sms();
        if ($model->load(Yii::$app->request->post())) {
            $textSms = $model->detalle;
            $modelContactosGrupoSeleccionado = ContactoGrupo::find()->where(['grupo_id' => $model->grupo_id])->all();
            if (!empty($modelContactosGrupoSeleccionado)) {
                foreach ($modelContactosGrupoSeleccionado as $value) {
                    $model = new Sms();
                    $modelContacto = Contacto::find()->select(['id', 'numero'])->where(['id' => $value->contacto_id])->one();
                    echo $modelContacto->numero . '<br>';
                    $model->detalle = $textSms;
                    $model->contacto_id = $modelContacto->id;
                    $model->usuario_id = Yii::$app->user->identity->id;

                    $model->save();

                    /*  $twilioService = Yii::$app->Yii2Twilio->initTwilio();

                      try {
                      $message = $twilioService->account->messages->create(
                      $modelContacto->numero, // To a number that you want to send sms
                      array(
                      "from" => "+1763-280-7560", // From a number that you are sending
                      "body" => $textSms,
                      ));

                      echo "Enviado";

                      } catch (\Twilio\Exceptions\RestException $e) {
                      //  echo $e->getMessage();
                      } */
                }
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('_smsGrupal', [
                        'model' => $model,
            ]);
        }
    }

    public function actionSmsIndividual($contacto) {

        $modelContacto = Contacto::find()->where(['id' => $contacto])->one();
        $numero = $modelContacto->numero;
        $model = new Sms();
        $searchModel = new ContactoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if ($model->load(Yii::$app->request->post())) {

            $twilioService = Yii::$app->Yii2Twilio->initTwilio();

            try {
                $message = $twilioService->account->messages->create(
                        $numero, // To a number that you want to send sms
                        array(
                    "from" => "+1763-280-7560", // From a number that you are sending
                    "body" => $model->detalle,
                ));
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            } catch (\Twilio\Exceptions\RestException $e) {
                
                
                 Yii::$app->session->setFlash( "error",$e->getMessage());
                 
                  return $this->redirect(['index']);
            }
             
        }
        return $this->render('_smsIndividual', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'modelContacto' => $modelContacto,
                    'model' => $model,
        ]);
    }

    public function actionIndex() {
        $searchModel = new SmsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra un modelo Sms basado en su valor de clave principal.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo modelo Sms.
     * Si la creación se realiza correctamente, el navegador será redirigido a la página especificada.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Sms();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Actualiza el modelo Sms basado en su valor de clave principal.
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
     * Elimina el modelo Sms basado en su valor de clave principal.
     * Si la eliminación se realiza correctamente, el navegador será redirigido a lapágina especificada.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Busca el modelo Sms basado en su valor de clave principal.
     * Si no se encuentra el modelo, se lanzará una excepción de 404 HTTP.
     * @param integer $id
     * @return Sms retorna el modelo cargado
     * @throws NotFoundHttpException Excepción  Si el modelo no se puede encontrar
     */
    protected function findModel($id) {
        if (($model = Sms::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }

}
