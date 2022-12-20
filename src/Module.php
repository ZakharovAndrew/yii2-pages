<?php

/**
 * Yii2 Pages
 * *************
 * Yii2 pages with database module with GUI manager supported.
 *  
 * @link https://github.com/ZakharovAndrew/yii2-pages/
 * @copyright Copyright (c) 2022 Zakharov Andrew
 */
 
namespace ZakharovAndrew\settings;

use Yii;

/**
 * Class Module 
 */
class Module extends \yii\base\Module
{    
    public $bootstrapVersion = '';
    
    /**
     *
     * @var string source language for translation 
     */
    public $sourceLanguage = 'en-US';
    
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'ZakharovAndrew\pages\controllers';

    /**
     * {@inheritdoc}
     * @throws \yii\base\InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }
    
    /**
     * Registers the translation files
     */
    protected function registerTranslations()
    {
        Yii::$app->i18n->translations['extension/yii2-pages/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => $this->sourceLanguage,
            'basePath' => '@vendor/zakharov-andrew/yii2-pages/src/messages',
            'on missingTranslation' => ['app\components\TranslationEventHandler', 'handleMissingTranslation'],
            'fileMap' => [
                'extension/yii2-pages/pages' => 'pages.php',
            ],
        ];
    }

    /**
     * Translates a message. This is just a wrapper of Yii::t
     *
     * @see Yii::t
     *
     * @param $category
     * @param $message
     * @param array $params
     * @param null $language
     * @return string
     */
    public static function t($message, $params = [], $language = null)
    {
        $category = 'pages';
        return Yii::t('extension/yii2-pages/' . $category, $message, $params, $language);
    }
    
}
