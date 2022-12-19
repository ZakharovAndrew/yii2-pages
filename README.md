# Yii2 pages
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
./yii migrate/up --migrationPath=@vendor/zakharov-andrew/yii2-settings/migrations
```

in order to create the settings table in your database.
