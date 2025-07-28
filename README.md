# Yii2 pages

<div align="center">

[![Latest Stable Version](https://poser.pugx.org/zakharov-andrew/yii2-pages/v/stable)](https://packagist.org/packages/zakharov-andrew/yii2-pages)
[![Total Downloads](https://poser.pugx.org/zakharov-andrew/yii2-pages/downloads)](https://packagist.org/packages/zakharov-andrew/yii2-pages)
[![License](https://poser.pugx.org/zakharov-andrew/yii2-pages/license)](https://packagist.org/packages/zakharov-andrew/yii2-pages)
[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

⚡️**Powerful page management system for Yii2 applications** - easily create, manage and display content pages with SEO-friendly URLs, Bootstrap 5 support and flexible configuration.

<p align="center">
  <a href="#-features">Features</a> •
  <a href="#-installation">Installation</a> •
  <a href="#-usage">Usage</a> •
  <a href="#-contributing">Contributing</a> •
  <a href="#-license">License</a>
</p>

</div>

---

## 🌟 Features

- **Simple CRUD operations** for managing pages
- **SEO-friendly URLs** with customizable routing
- **Bootstrap 5 support** out of the box (configurable)
- **Easy integration** with existing Yii2 applications
- **Migrations included** for quick setup
- **Flexible URL management** with customizable routes

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

```php
    'modules' => [
        'pages' => [
            'class' => 'ZakharovAndrew\pages\Module',
            'bootstrapVersion' => 5, // if use bootstrap 5
            'showTitle' => true, // display H1 headings (default - true)
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
