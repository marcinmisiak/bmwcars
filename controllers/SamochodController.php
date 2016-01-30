<?php

namespace app\controllers;

use Yii;
use app\models\Samochod;
use app\models\SamochodSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
//use yii\web\UploadedFile;
use app\models\ZapytajForm;
use yii\helpers\Html;


/**
 * SamochodController implements the CRUD actions for Samochod model.
 */
class SamochodController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Samochod models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SamochodSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Samochod model.
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
     * Creates a new Samochod model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Samochod();
        
        if ($model->load(Yii::$app->request->post()) ) {
        	if ($model->upload()) {
        		if($model->save() ) {
	        		return $this->redirect(['view', 'id' => $model->id]);
        		} else {
        			return $this->render('create', [
        					'model' => $model,
        			]);
        		}
        	} else {
        		return $this->render('create', [
        				'model' => $model,
        		]);
        	}
        	
        	
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
     
    }

    /**
     * Updates an existing Samochod model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
       
        $model->scenario='update';
        if ($model->load(Yii::$app->request->post())) {
        	
        	if ($model->upload()) {
        		if($model->save() ) {
           			 return $this->redirect(['view', 'id' => $model->id]);
        		}
        	} else {
        	if($model->save() ) {
           			 return $this->redirect(['view', 'id' => $model->id]);
        		};
        	}
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Samochod model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
    	$model = $this->findModel($id);
    	$path = Yii::$app->basePath. DIRECTORY_SEPARATOR.'web'. DIRECTORY_SEPARATOR. 'uploads'. DIRECTORY_SEPARATOR;
    	if (is_file($path.$model->miniatura)) {
    		unlink($path.$model->miniatura);
    	}
    	if (is_file($path.$model->zdjecie1)) {
    	unlink($path.$model->zdjecie1);
    	}
    	if (is_file($path.$model->zdjecie2)) {
    	unlink($path.$model->zdjecie2);
    	}
    	if (is_file($path.$model->zdjecie3)) {
    	unlink($path.$model->zdjecie3);
    	}
    	if (is_file($path.$model->zdjecie4)) {
    	unlink($path.$model->zdjecie4);
    	}
    	
        $model->delete();
        

        return $this->redirect(['index']);
    }

    /**
     * Finds the Samochod model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Samochod the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Samochod::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionDeletepicture($id, $plik) {
    	$model = $this->findModel($id);
    	$path = Yii::$app->basePath. DIRECTORY_SEPARATOR.'web'. DIRECTORY_SEPARATOR. 'uploads'. DIRECTORY_SEPARATOR;
    	if (is_file($path.$model->$plik)) {
    		unlink($path.$model->$plik);
    	}
    	return $this->redirect(['view', 'id' => $model->id]);
    }
    
    public function actionLista() {
    	$searchModel = new SamochodSearch();
    	$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    	
    	return $this->render('lista', [
    			'searchModel' => $searchModel,
    			'dataProvider' => $dataProvider,
    	]);
    }
    
    public function actionSzczegoly($id){
    	return $this->render('szczegoly', [
    			'model' => $this->findModel($id),
    	]);
    }
    
    public function actionZapytaj($id){
    	$model = new ZapytajForm();
    	$samochod = $this->findModel($id);
    	
    
    	
    	if ($model->load(Yii::$app->request->post())){
    		$model->subject = "Pytanie o ofertę: id:". $samochod->id . "model: ". $samochod->model . "rocznik: " . $samochod->rocznik;
    		$model->body = "<p>Proszę o ofertę na samochod: " . Html::a(  $samochod->model,   \Yii::$app->getUrlManager()->createAbsoluteUrl(['samochod/szczegoly', 'id'=>$samochod->id]) )."</p>".
    				"<p>Z poważaniem: <br>". $model->name;
    		if($model->contact(Yii::$app->params['adminEmail'])) {
    	
    		
    		Yii::$app->session->setFlash('contactFormSubmitted');
    		
    		return $this->refresh();
    		}
    	}
    	
    	$model->subject = "Pytanie o ofertę: id:". $samochod->id . "model: ". $samochod->model . "rocznik: " . $samochod->rocznik;
    	$model->body = "<p>Proszę o ofertę na samochod: " . Html::a(  $samochod->model,   \Yii::$app->getUrlManager()->createAbsoluteUrl(['samochod/szczegoly', 'id'=>$samochod->id]) )."</p>".
    			"<p>Z poważaniem";
    	
    	return $this->render('zapytaj', [
    			'model' =>$model,  'samochod'=> $this->findModel($id),
    	]);
    }
}
