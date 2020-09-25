<?php

namespace common\models;

use common\models\Dosen;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * DosenSearch represents the model behind the search form of `common\models\Dosen`.
 */
class DosenSearch extends Dosen {
	/**
	 * @inheritdoc
	 */
	public $username;

	public function rules() {
		return [
			[['id', 'no_hp', 'user_id'], 'integer'],
			[['nama_dosen', 'username'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = Dosen::find();
		$query->joinWith(['user']);

		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
		]);
		$dataProvider->sort->attributes['username'] = [
			'asc' => ['user.username' => SORT_ASC],
			'desc' => ['user.username' => SORT_DESC],
		];
		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		// grid filtering conditions
		$query->andFilterWhere([
			'id' => $this->id,
			'no_hp' => $this->no_hp,
			'user_id' => $this->user_id,
		]);

		$query->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
			->andFilterWhere(['like', 'user.username', $this->username]);

		return $dataProvider;
	}
}
