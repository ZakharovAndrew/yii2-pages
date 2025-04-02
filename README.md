# Yii2 pages

<div align="center">

[![Latest Stable Version](https://poser.pugx.org/zakharov-andrew/yii2-pages/v/stable)](https://packagist.org/packages/zakharov-andrew/yii2-pages)
[![Total Downloads](https://poser.pugx.org/zakharov-andrew/yii2-pages/downloads)](https://packagist.org/packages/zakharov-andrew/yii2-pages)
[![License](https://poser.pugx.org/zakharov-andrew/yii2-pages/license)](https://packagist.org/packages/zakharov-andrew/yii2-pages)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

⚡️ Yii2 Pages is a powerful and flexible module for creating and managing content pages in your application. It’s perfect for implementing sections like "About Us," "Contact," "Terms of Service," and other static pages.

With this module, you can easily add, edit, and manage pages directly from your application's admin panel. The module provides an intuitive interface and all the necessary tools for efficient content management.

<p align="center">
  <a href="#-features">Features</a> •
  <a href="#-installation">Installation</a> •
  <a href="#-usage">Usage</a> •
  <a href="#-contributing">Contributing</a> •
  <a href="#-license">License</a>
</p>

</div>

---

## 🚀 Installation

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

## 🔧 Usage

Add this to your main configuration's modules array

```
    'modules' => [
        'pages' => [
            'class' => 'ZakharovAndrew\pages\Module',
            'bootstrapVersion' => 5, // if use bootstrap 5
        ],
        // ...
    ],
```

Add a new rule for `urlManager` of your application's configuration file, for example:

```php
'urlManager' => [
    'rules' => [
        'pages' => 'pages/default/index',
        'pages/create' => 'pages/default/create',
        'pages/update' => 'pages/default/update',
        'pages/delete' => 'pages/default/delete',
        'p/<url:[a-zA-Z0-9\-]+>'=>'pages/default/view',
    ],
],
```
## 👥 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

**yii2-pages** it is available under a MIT License. Detailed information can be found in the `LICENSE.md`.
