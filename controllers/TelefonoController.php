<?php

namespace app\controllers;

use Yii;
use app\models\Telefono;
use app\models\TelefonoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TelefonoController implements the CRUD actions for Telefono model.
 */
class TelefonoController extends Controller
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
     * Lists all Telefono models.
     * @return mixed
     */
    public function actionIndex()
    {
           if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
             $searchModel = new TelefonoSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
            }
        }
     

    /**
     * Displays a single Telefono model.
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
            return $this->render('view', [
            'model' => $this->findModel($id),
            ]);
        }
        
    }

    /**
     * Creates a new Telefono model.
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
            $model = new Telefono();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->ID]);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }
        
    }

    /**
     * Updates an existing Telefono model.
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
                return $this->redirect(['view', 'id' => $model->ID]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);

        }
      
    }

    /**
     * Deletes an existing Telefono model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
           if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
              $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
      
    }

    /**
     * Finds the Telefono model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Telefono the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Telefono::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
