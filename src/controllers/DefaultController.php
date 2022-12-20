<?php

namespace ZakharovAndrew\pages\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use ZakharovAndrew\settings\models\Settings;


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
}
