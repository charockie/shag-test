<?php

return [
    '/' => 'site/index',
    '/admin-student' => 'students/admin-student/index',
    [
        'class' => \yii\web\GroupUrlRule::className(),
        'prefix' => 'admin-student/student',
        'routePrefix' => 'students/admin-student',
        'rules' => [
            '' => 'index',
            '<id:\d+>' => 'view',
            'create' => 'create',
            '<id:\d+>/edit' => 'update',
            '<id:\d+>/delete' => 'delete',
        ]
    ],

    '/admin-group' => 'groups/admin-group/index',
    [
        'class' => \yii\web\GroupUrlRule::className(),
        'prefix' => 'admin-group/group',
        'routePrefix' => 'groups/admin-group',
        'rules' => [
            '' => 'index',
            '<id:\d+>' => 'view',
            'create' => 'create',
            '<id:\d+>/edit' => 'update',
            '<id:\d+>/delete' => 'delete',
        ]
    ],
    
    'site/student' => 'site/student',
];