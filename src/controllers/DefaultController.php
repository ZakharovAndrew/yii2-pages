<?php

namespace ZakharovAndrew\pages\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use ZakharovAndrew\pages\models\Pages;
use ZakharovAndrew\pages\models\PagesSearch;


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
                        'roles' => ['@'],
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
     * Finds the Pages model based on its url value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $url url
     * @return Pages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelbyUrl($url)
    {
        if (($model = Page::findOne(['url' => $url])) !== null) {            
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
