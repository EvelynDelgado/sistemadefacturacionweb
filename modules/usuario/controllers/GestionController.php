<?php

namespace app\modules\usuario\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Usuario;
use app\models\User;
use app\models\PasswordForm;
use yii\web\UploadedFile;
use app\models\UsuarioSearch;

/**
 * Default controller for the `soporte` module
 */
class GestionController extends Controller {

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
                        'actions' => ['logout', 'index', 'view', 'create', 'update', 'rol','delete', 'perfil', 'changepassword'],
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

    public function actionRol() {
         return $this->render('roles');
    }
    
    public function actionChangepassword() {
        $model = new PasswordForm;
        $modelPerfilUsuario = User::find()->where([
                    'username' => Yii::$app->user->identity->username
                ])->one();
        print_r($modelPerfilUsuario);
        // die();
        if ($model->load(Yii::$app->request->post())) {


            if ($model->validate()) {
                try {
                    $modelPerfilUsuario->password = $_POST['PasswordForm']['newpass'];
                    if ($modelPerfilUsuario->save()) {
                        Yii::$app->getSession()->setFlash(
                                'success', 'Clave Cambiada'
                        );

                        return $this->redirect(['gestion/perfil']);
                    } else {
                        Yii::$app->getSession()->setFlash(
                                'error', 'Clave no cambiada'
                        );
                        return $this->render('actualizarPerfil', [
                                    'modelPerfilUsuario' => $modelPerfilUsuario,
                                    'model' => $model
                        ]);
                    }
                } catch (Exception $e) {
                    Yii::$app->getSession()->setFlash(
                            'error', "{$e->getMessage()}"
                    );
                    return $this->render('actualizarPerfil', [
                                'modelPerfilUsuario' => $modelPerfilUsuario,
                                'model' => $model
                    ]);
                }
            } else {
                return $this->render('actualizarPerfil', [
                            'modelPerfilUsuario' => $modelPerfilUsuario,
                            'model' => $model
                ]);
            }
        } else {
            return $this->render('actualizarPerfil', [
                        'modelPerfilUsuario' => $modelPerfilUsuario,
                        'model' => $model
            ]);
        }
    }

    public function actionPerfil() {

        $modelPerfilUsuario = Usuario::findOne(Yii::$app->user->identity->id);
        $model = new PasswordForm;

        if ($modelPerfilUsuario->load(Yii::$app->request->post())) {
            $nombreImagen = $modelPerfilUsuario->primaryKey;
            $modelPerfilUsuario->file = UploadedFile::getInstance($modelPerfilUsuario, 'file');


            if (!empty($modelPerfilUsuario->email)) {
                //Buscar el username en la tabla
                $tableResultadoEmail = Usuario::find()->where("email=:email", [":email" => $modelPerfilUsuario->email]);
                //Si el username existe mostrar el error

                $tableResultadoUsuario = Usuario::findOne($modelPerfilUsuario->id);
                if ($tableResultadoEmail->count() == 1 && $tableResultadoUsuario->email != $modelPerfilUsuario->email) {

                    Yii::$app->session->setFlash("error", "El correo electrónico seleccionado ya se encuentra en uso!");
                    return $this->render('actualizarPerfil', [
                                'modelPerfilUsuario' => $modelPerfilUsuario,
                                'model' => $model
                    ]);
                }
            }


            $modelPerfilUsuario->save();


            if ($modelPerfilUsuario->file != '') {
                $modelPerfilUsuario->file->saveAs('img/usuarios/' . $nombreImagen . '.' . $modelPerfilUsuario->file->extension);
                $modelPerfilUsuario->foto = 'img/usuarios/' . $nombreImagen . '.' . $modelPerfilUsuario->file->extension;
                $modelPerfilUsuario->save();
            }
            Yii::$app->session->setFlash("success", "Pelfil Actualzado con exitó!");
            return $this->redirect(['perfil']);
        } else {

            return $this->render('actualizarPerfil', [
                        'modelPerfilUsuario' => $modelPerfilUsuario,
                        'model' => $model
            ]);
        }
    }

    /**
     * Lista todo el modelo Soporte.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Muestra un modelo Soporte basado en su valor de clave principal.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Crea un nuevo modelo Soporte.
     * Si la creación se realiza correctamente, el navegador será redirigido a la página especificada.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Usuario();

        if ($model->load(Yii::$app->request->post())) {
            $model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Actualiza el modelo Soporte basado en su valor de clave principal.
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
     * Elimina el modelo Soporte basado en su valor de clave principal.
     * Si la eliminación se realiza correctamente, el navegador será redirigido a lapágina especificada.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Busca el modelo Soporte basado en su valor de clave principal.
     * Si no se encuentra el modelo, se lanzará una excepción de 404 HTTP.
     * @param integer $id
     * @return Soporte retorna el modelo cargado
     * @throws NotFoundHttpException Excepción  Si el modelo no se puede encontrar
     */
    protected function findModel($id) {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('La página solicitada no existe.');
        }
    }

}
