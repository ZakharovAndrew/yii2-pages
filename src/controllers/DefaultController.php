<?php

namespace ZakharovAndrew\pages\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use ZakharovAndrew\pages\models\Pages;
use ZakharovAndrew\pages\models\PagesSearch;
use ZakharovAndrew\pages\Module;

/**
 * DefaultController implements the CRUD actions for Pages model.
 * @author Andrew Zakharov https://github.com/ZakharovAndrew
 */
class DefaultController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                       'allow' => true,
                        'roles' => ['?', '@'],
                        'matchCallback' => function ($rule, $action) {
                            if ($action->id == 'view') {
                                return true;
                            }
                            
                            if (Yii::$app->user->isGuest) {
                                return false;
                            }
                            
                            return Yii::$app->user->identity->hasRole('admin');
                        }
                    ],
                ],
            ],
        ];
    }
    
    /**
     * Lists all Pages models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PagesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    /**
     * Displays a single Pages model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($url)
    {
        return $this->render('view', [
            'model' => $this->findModelbyUrl($url),
        ]);
    }
    
    /**
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pages();

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->url = ($model->url == '' ? Pages::translite(trim($model->title)) : $model->url);
            if ($model->save()) {
                return $this->redirect(['view', 'url' => $model->url]);
            } else {
                Yii::$app->session->setFlash('error', Module::t('Page creation error!')); // 'Ошибка создания страницы!'
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'bootstrapVersion' => Yii::$app->getModule('pages')->bootstrapVersion,
            'model' => $model,
        ]);
    }
    
    /**
     * Updates an existing Pages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'url' => $model->url]);
        }

        return $this->render('update', [
            'bootstrapVersion' => Yii::$app->getModule('pages')->bootstrapVersion,
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /**
     * Finds the Pages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pages::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    
    /**
     * Finds the Pages model based on its url value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $url url
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelbyUrl($url)
    {
        if (($model = Pages::findOne(['url' => $url])) !== null) {            
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
