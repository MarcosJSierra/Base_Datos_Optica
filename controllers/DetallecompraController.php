<?php

namespace app\controllers;

use Yii;
use app\models\Detallecompra;
use app\models\DetallecompraSearch;
use app\models\Lente;
use app\models\Accesorios;
use app\models\Aro;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetallecompraController implements the CRUD actions for Detallecompra model.
 */
class DetallecompraController extends Controller
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
     * Lists all Detallecompra models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $searchModel = new DetallecompraSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
            
    }

    /**
     * Displays a single Detallecompra model.
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
            $model = $this->findModel($id);
            $model1 = Lente::findOne($model->Lente_idLente);
            $model2 = Accesorios::findOne($model->ID_Accesorio);
            $model3 = Aro::findOne($model->ID_Aro);
            return $this->render('view', [
                'model' => $model,
                'model1' => $model1,
                'model2' => $model2,
                'model3' => $model3,
            ]);
        }
            
    }
    public function actionViewi($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model = $this->findModel($id);
            $model1 = Lente::findOne($model->Lente_idLente);
            $model2 = Accesorios::findOne($model->ID_Accesorio);
            $model3 = Aro::findOne($model->ID_Aro);
            return $this->render('viewi', [
                'model' => $model,
                'model1' => $model1,
                'model2' => $model2,
                'model3' => $model3,
            ]);
        }
            
    }
    public function actionViewip($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model = $this->findModel($id);
            $model1 = Lente::findOne($model->Lente_idLente);
            $model2 = Accesorios::findOne($model->ID_Accesorio);
            $model3 = Aro::findOne($model->ID_Aro);
            return $this->render('viewip', [
                'model' => $model,
                'model1' => $model1,
                'model2' => $model2,
                'model3' => $model3,
            ]);
        }
            
    }
    /**
     * Creates a new Detallecompra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id, $ida)
    {
       if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model = new Detallecompra();
            if($ida!=0)
            {
                $model->ID_Accesorio=$ida;
            }
            $model->Cantidad=0;
            $model->Precio_Compra=0;
            $model->Precio_Venta=0;
            $model->ID_Compra = $id;
            $accesorioss = [];
            $tmp = Accesorios::find()->all();
            foreach($tmp as $accesorio){
                $accesorioss[$accesorio->idAccesorio]="Nombre: ".$accesorio->Nombre.";  Descripcion: ".$accesorio->Descripcion.";  Existencia: ".$accesorio->Existencia;

            }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['compra/creates', 'id' => $id]);
            }

            return $this->render('create', [
                'model' => $model,
                'accesorioss'=>$accesorioss,
                'id'=>$id,
            ]);
        }
            
    }
    public function actionCreatelt($id, $idlen)
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model = new Detallecompra();
            if($idlen != 0)
            {
                $model->Lente_idLente=$idlen;
            }
            $model->Cantidad=0;
            $model->Precio_Compra=0;
            $model->Precio_Venta=0;
            $model->ID_Compra = $id;
            $lentes =[];
            $tmp = Lente::find()->all();
            foreach($tmp as $len){
                if($len->Terminado==1)
                {

                    $lentes[$len->idLente]="Material:".$len->Material."; Tipo:".$len->Tipo."Precio Venta: ".$len->Precio_Venta."; Graduacion: ".$len->graduacion_base."; Excedente: ".$len->Graduacion_Ecxedente;
                }
            }
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['compra/creates', 'id' => $id]);
            }

            return $this->render('createlt', [
                'model' => $model,
                'lentes' => $lentes,
                'id'=>$id,
            ]);
        }

            
    }

    public function actionCreatels($id, $idlen)
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model = new Detallecompra();
            if($idlen != 0)
            {
                $model->Lente_idLente=$idlen;
            }
            $model->Cantidad=0;
            $model->Precio_Compra=0;
            $model->Precio_Venta=0;
            $model->ID_Compra = $id;
            $lentes =[];
            $tmp = Lente::find()->all();
            foreach($tmp as $len){
                if($len->Terminado == 0)
                {

                    $lentes[$len->idLente]="Material:".$len->Material."; Tipo:".$len->Tipo."Precio Venta: ".$len->Precio_Venta."; Graduacion: ".$len->graduacion_base."; Excedente: ".$len->Graduacion_Ecxedente;
                }
            }
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['compra/creates', 'id' => $id]);
            }

            return $this->render('createls', [
                'model' => $model,
                'lentes' => $lentes,
                'id'=>$id,
            ]);
        }

            
    }

    public function actionCreatea($id, $ida)
    {
        if (Yii::$app->user->isGuest) {
            return $this-> goHome();
        }
        else 
        {
            $model = new Detallecompra();
            if($ida != 0)
            {
                $model->ID_Aro = $ida;
            }
            //$model->Lente_idLente=0;
            //$model->ID_Accesorio=0;
            $model->Cantidad=0;
            $model->Precio_Compra=0;
            $model->Precio_Venta=0;
            $model->ID_Compra = $id;
            $aros= [];
            $tmp1 = Aro::find()->all();
            foreach($tmp1 as $ar){
                $aros[$ar->idAro]="Marca: ".$ar->Marca."; Material: ".$ar->Material."; Precio: ".$ar->Precio_Venta."; Codigo: ".$ar->Codigo;
            }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['compra/creates', 'id' => $id]);
            }

            return $this->render('createa', [
                'model' => $model,
                'aros'=>$aros,
                'id'=>$id,
            ]);
        }
            
    }


    /**
     * Updates an existing Detallecompra model.
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
            $lentes =[];
            $tmp = Lente::find()->all();
            foreach($tmp as $len){
                

                     $lentes[$len->idLente]="Material:".$len->Material."; Tipo:".$len->Tipo."Precio Venta: ".$len->Precio_Venta."; Graduacion: ".$len->graduacion_base."; Excedente: ".$len->Graduacion_Ecxedente;
                
            }
            $accesorioss = [];
            $tmp2 = Accesorios::find()->all();
            foreach($tmp2 as $accesorio){
                $accesorioss[$accesorio->idAccesorio]="Nombre: ".$accesorio->Nombre.";  Descripcion: ".$accesorio->Descripcion.";  Existencia: ".$accesorio->Existencia;

            }
            $aros= [];
            $tmp3 = Aro::find()->all();
            foreach($tmp3 as $ar){
                $aros[$ar->idAro]="Marca: ".$ar->Marca."; Material: ".$ar->Material."; Precio: ".$ar->Precio_Venta."; Codigo: ".$ar->Codigo;
            }

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['compra/creates', 'id' => $model->idCompra]);
            }

            return $this->render('update', [
                'model' => $model,
                 'lentes' => $lentes,
                'id'=>$model->ID_Compra,
                'aros'=>$aros,
                'accesorioss'=>$accesorioss,
            ]);
        }
            
    }

    /**
     * Deletes an existing Detallecompra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $idc)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['compra/creates','id'=>$idc]);
    }

    /**
     * Finds the Detallecompra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Detallecompra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Detallecompra::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
