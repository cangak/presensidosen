<?php

namespace backend\models;

use Yii;
use backend\models\SignupForm;
use common\models\Verifikator;
use common\models\User;
use yii\base\Model;


/**
 * This is the model class for table "verifikator".
 *
 * @property int $id
 * @property string $nama_verifikator
 * @property int $username
 * @property int $password
 * @property int $email
 * @property int $user_id

 */
class VerifikatorForm extends Model
{
    public $id;
    public $nama_verifikator;
    public $username;
    public $password;
    public $email;
    public $user_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_verifikator'], 'required'],
            // [['user_id'], 'integer'],
            [['nama_verifikator'], 'string', 'max' => 255],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Username ini sudah ada yang menggunakan'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email ini sudah ada yang memiliki.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_verifikator' => 'Nama Verifikator',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'E-mail',
            'user_id' => 'User ID',
        ];
    }

    public function tambahkan()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            $user->save();

            $auth = \Yii::$app->authManager;
            $verifikatorRole = $auth->getRole('verifikator');
            $auth->assign($verifikatorRole, $user->getId());

            $verifikator = new Verifikator();
            $verifikator->nama_verifikator = $this->nama_verifikator;
            $verifikator->user_id = $user->id;
            $verifikator->save();
            $this->id = $verifikator->id;
            return $verifikator;
        } else {
            return null;
        }

        
        
    }

    public function ubah()
    {

    }

    
}
