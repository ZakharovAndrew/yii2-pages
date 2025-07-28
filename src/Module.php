<?php

/**
 * Yii2 Pages
 * *************
 * Yii2 pages with database module with GUI manager supported.
 *  
 * @link https://github.com/ZakharovAndrew/yii2-pages/
 * @copyright Copyright (c) 2022-2025 Zakharov Andrew
 */
 
namespace ZakharovAndrew\pages;

use Yii;

/**
 * Page Module 
 */
class Module extends \yii\base\Module
{
    /**
     * @var string version Bootstrap
     */
    public $bootstrapVersion = '';
 
    public $useTranslite = false;

    /**
     * @var bool show H1
     */
    public $showTitle = true;
 
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
     
        self::registerTranslations();
    }
    
    /**
     * Registers the translation files
     */
    protected static function registerTranslations()
    {
        if (isset(Yii::$app->i18n->translations['extension/yii2-pages/*'])) {
            return;
        }
     
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
        static::registerTranslations();
     
        $category = 'pages';
        return Yii::t('extension/yii2-pages/' . $category, $message, $params, $language);
    }
    
}
