<?php

namespace backend\controllers;

use Yii;
use common\models\Akun3;
use common\models\Akun3Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use \yii\web\Response;
use yii\helpers\Html;

/**
 * Akun3Controller implements the CRUD actions for Akun3 model.
 */
class Akun3Controller extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'bulk-delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Akun3 models.
     * @return mixed
     */
    public function actionIndex()
    {    
        $searchModel = new Akun3Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Akun3 model.
     * @param integer $kd_akun1
     * @param integer $kd_akun2
     * @param integer $kd_akun3
     * @return mixed
     */
    public function actionView($kd_akun1, $kd_akun2, $kd_akun3)
    {   
        $request = Yii::$app->request;
        if($request->isAjax){
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                    'title'=> "Akun3 #".$kd_akun1, $kd_akun2, $kd_akun3,
                    'content'=>$this->renderAjax('view', [
                        'model' => $this->findModel($kd_akun1, $kd_akun2, $kd_akun3),
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','kd_akun1, $kd_akun2, $kd_akun3'=>$kd_akun1, $kd_akun2, $kd_akun3],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
        }else{
            return $this->render('view', [
                'model' => $this->findModel($kd_akun1, $kd_akun2, $kd_akun3),
            ]);
        }
    }

    /**
     * Creates a new Akun3 model.
     * For ajax request will return json object
     * and for non-ajax request if creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $request = Yii::$app->request;
        $model = new Akun3();  

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Create new Akun3",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Create new Akun3",
                    'content'=>'<span class="text-success">Create Akun3 success</span>',
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Create More',['create'],['class'=>'btn btn-primary','role'=>'modal-remote'])
        
                ];         
            }else{           
                return [
                    'title'=> "Create new Akun3",
                    'content'=>$this->renderAjax('create', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
        
                ];         
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'kd_akun1' => $model->kd_akun1, 'kd_akun2' => $model->kd_akun2, 'kd_akun3' => $model->kd_akun3]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        }
       
    }

    /**
     * Updates an existing Akun3 model.
     * For ajax request will return json object
     * and for non-ajax request if update is successful, the browser will be redirected to the 'view' page.
     * @param integer $kd_akun1
     * @param integer $kd_akun2
     * @param integer $kd_akun3
     * @return mixed
     */
    public function actionUpdate($kd_akun1, $kd_akun2, $kd_akun3)
    {
        $request = Yii::$app->request;
        $model = $this->findModel($kd_akun1, $kd_akun2, $kd_akun3);       

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            if($request->isGet){
                return [
                    'title'=> "Update Akun3 #".$kd_akun1, $kd_akun2, $kd_akun3,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];         
            }else if($model->load($request->post()) && $model->save()){
                return [
                    'forceReload'=>'#crud-datatable-pjax',
                    'title'=> "Akun3 #".$kd_akun1, $kd_akun2, $kd_akun3,
                    'content'=>$this->renderAjax('view', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                            Html::a('Edit',['update','kd_akun1, $kd_akun2, $kd_akun3'=>$kd_akun1, $kd_akun2, $kd_akun3],['class'=>'btn btn-primary','role'=>'modal-remote'])
                ];    
            }else{
                 return [
                    'title'=> "Update Akun3 #".$kd_akun1, $kd_akun2, $kd_akun3,
                    'content'=>$this->renderAjax('update', [
                        'model' => $model,
                    ]),
                    'footer'=> Html::button('Close',['class'=>'btn btn-default pull-left','data-dismiss'=>"modal"]).
                                Html::button('Save',['class'=>'btn btn-primary','type'=>"submit"])
                ];        
            }
        }else{
            /*
            *   Process for non-ajax request
            */
            if ($model->load($request->post()) && $model->save()) {
                return $this->redirect(['view', 'kd_akun1' => $model->kd_akun1, 'kd_akun2' => $model->kd_akun2, 'kd_akun3' => $model->kd_akun3]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }
        }
    }

    /**
     * Delete an existing Akun3 model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $kd_akun1
     * @param integer $kd_akun2
     * @param integer $kd_akun3
     * @return mixed
     */
    public function actionDelete($kd_akun1, $kd_akun2, $kd_akun3)
    {
        $request = Yii::$app->request;
        $this->findModel($kd_akun1, $kd_akun2, $kd_akun3)->delete();

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }


    }

     /**
     * Delete multiple existing Akun3 model.
     * For ajax request will return json object
     * and for non-ajax request if deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $kd_akun1
     * @param integer $kd_akun2
     * @param integer $kd_akun3
     * @return mixed
     */
    public function actionBulkDelete()
    {        
        $request = Yii::$app->request;
        $pks = explode(',', $request->post( 'pks' )); // Array or selected records primary keys
        foreach ( $pks as $pk ) {
            $model = $this->findModel($pk);
            $model->delete();
        }

        if($request->isAjax){
            /*
            *   Process for ajax request
            */
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ['forceClose'=>true,'forceReload'=>'#crud-datatable-pjax'];
        }else{
            /*
            *   Process for non-ajax request
            */
            return $this->redirect(['index']);
        }
       
    }

    /**
     * Finds the Akun3 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $kd_akun1
     * @param integer $kd_akun2
     * @param integer $kd_akun3
     * @return Akun3 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($kd_akun1, $kd_akun2, $kd_akun3)
    {
        if (($model = Akun3::findOne(['kd_akun1' => $kd_akun1, 'kd_akun2' => $kd_akun2, 'kd_akun3' => $kd_akun3])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
