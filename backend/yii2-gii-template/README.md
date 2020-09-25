# Template Gii

Template gii untuk yii2 yang menggunakan support adminlte yii2
```
https://github.com/dmstr/yii2-adminlte-asset
```

## Cara menggunakan

* Clone git ini pada root directory backend

* Edit pada backend/config/main-local.php
```
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'generators' => [ 
        'crud' => [ 
            'class' => 'yii\gii\generators\crud\Generator', 
            'templates' => [ //setting for out templates
                'crudCustom' => '@backend/yii2-gii-template/crud/simple', 
            ]
        ]
    ],
];
```