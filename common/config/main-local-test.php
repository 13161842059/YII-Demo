<?php
//main-local-test文件 git自动忽略  本地修改成main-local
/**
*配置文件都写在这里，包括MYSQL,REDIS......
*/
$config = [ 
        'components' => [ 
                'request' => [
                        // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
                        'cookieValidationKey' => 'dxc4dS9qoR2TwzBaO-OpoKyUZIsUAbPG' 
                ],
                'db' => [ 
                        'class' => 'yii\db\Connection',
                        'dsn' => 'mysql:host=127.0.0.1;dbname=sunlands',
                        'username' => 'root',
                        'password' => 'root',
                        'charset' => 'utf8mb4' 
                ],
                'ananasDb' => [ 
                        'class' => 'yii\db\Connection',
                        'dsn' => 'mysql:host=127.0.0.1;dbname=ananas',
                        'username' => 'root',
                        'password' => '',
                        'charset' => 'utf8mb4' 
                ],
                'ent_portal_prod' => [ 
                        'class' => 'yii\db\Connection',
                        'dsn' => 'mysql:host=localhost;dbname=ent_portal_prod',
                        'username' => 'root',
                        'password' => '',
                        'charset' => 'utf8mb4' 
                ],
                'newdragnet' => [ 
                        'class' => 'yii\db\Connection',
                        'dsn' => 'mysql:host=localhost;dbname=newdragnet',
                        'username' => 'root',
                        'password' => '',
                        'charset' => 'utf8' 
                ],
                'opportunityAssignerDb' => [ 
                        'class' => 'yii\db\Connection',
                        'dsn' => 'mysql:host=127.0.0.1;dbname=opportunity_assigner',
                        'username' => 'root',
                        'password' => '',
                        'charset' => 'utf8mb4' 
                ],
//              'redis' => [ 
//                      'class' => 'yii\redis\Connection' 
//              ]
//              ,
                'mongodb' => [ 
                        'class' => 'yii\mongodb\Connection',
                        'dsn' => 'mongodb://test:q0y1F4FGWLdssvBvrdscQ@127.0.0.1:27017/sunlandsTest',
                        //'dsn' => 'mongodb://localhost:27017/sunlands',
                        //'options' => [ ],
                        // "username" => "",
                        // "password" => ""
                         
                ],
                "authManager" => [ 
                        "class" => 'yii\rbac\DbManager',
                        "defaultRoles" => [ 
                                'guest' 
                        ],
                        'itemTable' => 'auth_item',
                        'assignmentTable' => 'auth_assignment',
                        'itemChildTable' => 'auth_item_child' 
                ],
//              'session' => [ 
//                      'class' => 'yii\redis\Session' 
//              ] 
        ]
         
];

if (! YII_ENV_TEST) {
    // configuration adjustments for 'dev' environment
    $config ['bootstrap'] [] = 'debug';
    $config ['modules'] ['debug'] = [ 
            'class' => 'yii\debug\Module' 
    ];
    
    $config ['bootstrap'] [] = 'gii';
    $config ['modules'] ['gii'] = [ 
            'class' => 'yii\gii\Module' 
    ];
}

return $config;
