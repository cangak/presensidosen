<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use console\models\SignupForm;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        
        $createUserDosen = $auth->createPermission('createUserDosen');
        $createUserDosen->description = 'Membuat user dosen';
        $auth->add($createUserDosen);

        $createUserOperator = $auth->createPermission('createUserOperator');
        $createUserOperator->description = 'Membuat user operator';
        $auth->add($createUserOperator);

        $createUserVerifikator = $auth->createPermission('createUserVerifikator');
        $createUserVerifikator->description = 'Membuat user verifikator';
        $auth->add($createUserVerifikator);

        $operator = $auth->createRole('operator');
        $auth->add($operator);
        $auth->addChild($operator, $createUserDosen);
        $auth->addChild($operator, $createUserVerifikator);
        
        $root = $auth->createRole('root');
        $root->description = "User tertinggi";
        $auth->add($root);
        $auth->addChild($root, $createUserOperator);
        $auth->addChild($root, $operator);

        $dosen = $auth->createRole('dosen');
        $dosen->description = "Dosen juga manusia";
        $auth->add($dosen);

        $verifikator = $auth->createRole('verifikator');
        $auth->add($verifikator);

        //membuat user root default
        $model = new SignupForm();
        $model->username = 'cangakkeren';
        $model->password = 'j3mp0l4n';
        $model->email = 'cangak_keren@gmail.com';
        $model->signup();



        $auth->assign($root, 1);
    }
}