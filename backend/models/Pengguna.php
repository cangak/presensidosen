<?php

namespace backend\models;

use common\models\User;
use yii\base\Model;

/**
 * Signup form
 */
class Pengguna extends Model {

	public $username;
	public $email;
	public $password;
	public $id;
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			['username', 'trim'],
			['username', 'required'],
			['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
			['username', 'string', 'min' => 2, 'max' => 255],

			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

			['password', 'required'],
			['password', 'string', 'min' => 6],

		];
	}

	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 */
	public function signupOperator() {
		if ($this->validate()) {
			$user = new User();
			$user->username = $this->username;
			$user->email = $this->email;
			$user->setPassword($this->password);
			$user->generateAuthKey();
			$user->save();

			$auth = \Yii::$app->authManager;
			$operatorRole = $auth->getRole('operator');
			$auth->assign($operatorRole, $user->getId());

			return $user;
		}

		return null;
	}

	public function signup() {
		if (!$this->validate()) {
			return null;
		}

		$user = new User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->setPassword($this->password);
		$user->generateAuthKey();
		$user->generateEmailVerificationToken();
		return $user->save();
	}
	public function ubahpassword($id) {
		$user = User::findOne($id);
		$user->username = $this->username;
		$user->email = $this->email;
		if ($this->password != '') {
			$user->setPassword($this->password);
		}
		return $user->save();

	}
}
