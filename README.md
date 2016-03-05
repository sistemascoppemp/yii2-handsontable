yii2-handsontable
=================

Yii2 Handsontable widget

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require deesoft/yii2-handsontable "~1.0"
```

or add

```
"deesoft/yii2-handsontable": "~1.0"
```

to the require section of your `composer.json` file.

Usage
-----

```php
<?php
use dee\handsontable\Handsontable;

?>

<?= Handsontable::widget([
    'varName' => 'table1', // <- optional
    'clientOptions' => [
        'data' => $data,
        'column' => [
            ['data' => 'id'],
            ['data' => 'name.first'],
            ['data' => 'name.last'],
            ['data' => 'address']
        ],
        'afterChange' => new JsExpresion('function(){...}'),
    ],
]);?>

<?php $this->registerJs($this->render('_script.js')); ?>
```
file `_script.js`
```javascript
$('mybtn').click(function(){
    tableData = table1.getData();
    // do something with tableData
});
```