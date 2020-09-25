<?php

namespace backend\models;

use Yii;
use backend\models\SignupForm;
use common\models\Dosen;
use common\models\User;
use yii\base\Model;


/**
 * This is the model class for table "dosen".
 *
 * @property int $id
 * @property string $nama_dosen
 * @property int $no_hp
 * @property int $username
 * @property int $password
 * @property int $email
 * @property int $user_id

 */
class DosenBaru extends Model
{
    public $id;
    public $nama_dosen;
    public $no_hp;
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
            [['nama_dosen', 'no_hp'], 'required'],
            [['no_hp'], 'integer'],
            [['nama_dosen'], 'string', 'max' => 255],

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
            'nama_dosen' => 'Nama Dosen',
            'no_hp' => 'No Hp',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'E-mail',
            'no_hp' => 'No Hp',
            'user_id' => 'User ID',
        ];
    }

    public function tambahkan()
    {
        if ($this->validate()) {
            $user = new SignupForm();
            $user->username = $this->username;
            $user->password = $this->password;
            $user->email = $this->email;
            $duser = $user->signup();

            $auth = \Yii::$app->authManager;
            $dosenRole = $auth->getRole('dosen');
            $auth->assign($dosenRole, $duser->id);

            $dosen = new Dosen();
            $dosen->id = $this->id;
            $dosen->nama_dosen = $this->nama_dosen;
            $dosen->no_hp = $this->no_hp;
            $dosen->user_id = $duser->id;
            $dosen->save();
            $this->id = $dosen->id;
            return $dosen;
        } else {
            return null;
        }
    }

    public function ubah()
    {

    }

    
}
