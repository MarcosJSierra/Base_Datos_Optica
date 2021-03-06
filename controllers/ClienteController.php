<?php

namespace app\controllers;

use Yii;
use app\models\Cliente;
use app\models\ClienteSearch;
use app\models\Venta;
use app\models\VentaSearch;
use app\models\Receta;
use app\models\RecetaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ClienteController implements the CRUD actions for Cliente model.
 */
class ClienteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Cliente models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $searchModel = new ClienteSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
            
    }

    /**
     * Displays a single Cliente model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model=$this->findModel($id);
            $searchModel = new VentaSearch();
             $searchModel->ID_Paciente = $id;
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            $searchModelo = new RecetaSearch();
            $searchModelo->idPaciente = $id;
            $dataProvidero = $searchModelo->search(Yii::$app->request->queryParams);
            
            return $this->render('view', [
                'model' => $model,
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'searchModelo' => $searchModelo,
                'dataProvidero' => $dataProvidero,
            ]);
        }
            
    }

    /**
     * Creates a new Cliente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model = new Cliente();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->idPaciente]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
            
    }

    public function actionCreatec()
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model = new Cliente();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['venta/create','id'=> $model->idPaciente]);
            }

            return $this->render('createc', [
                'model' => $model,
            ]);
        }
            
    }

    /**
     * Updates an existing Cliente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->idPaciente]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
            
    }

    /**
     * Deletes an existing Cliente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cliente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cliente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cliente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
