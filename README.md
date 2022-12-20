# Yii2 pages

[![Latest Stable Version](https://poser.pugx.org/zakharov-andrew/yii2-pages/v/stable)](https://packagist.org/packages/zakharov-andrew/yii2-pages)
[![License](https://poser.pugx.org/zakharov-andrew/yii2-pages/license)](https://packagist.org/packages/zakharov-andrew/yii2-pages)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

This extension allows you to add pages to your app.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ composer require zakharov-andrew/yii2-pages
```
or add

```
"zakharov-andrew/yii2-pages": "*"
```

to the ```require``` section of your ```composer.json``` file.

Subsequently, run

```
./yii migrate/up --migrationPath=@vendor/zakharov-andrew/yii2-pages/migrations
```

in order to create the settings table in your database.

Or add to console config

```php
return [
    // ...
    'controllerMap' => [
        // ...
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@console/migrations', // Default migration folder
                '@vendor/zakharov-andrew/yii2-pages/src/migrations'
            ]
        ]
        // ...
    ]
    // ...
];
```

Add a new rule for `urlManager` of your application's configuration file, for example:

```php
'urlManager' => [
    'rules' => [
        'pages' => 'pages/default/index',
        'pages/create' => 'pages/default/create',
        'pages/update' => 'pages/default/update',
        'pages/delete' => 'pages/default/delete',
    ],
],
```

## License

**yii2-pages** it is available under a MIT License. Detailed information can be found in the `LICENSE.md`.
