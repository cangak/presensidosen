<?php

namespace common\models;

use common\models\Jadwal;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * JadwalSearch represents the model behind the search form of `common\models\Jadwal`.
 */
class JadwalSearch extends Jadwal {
	/**
	 * @inheritdoc
	 */
	public $hari;
	public function rules() {
		return [
			[['id', 'hari_id', 'verifikator_id'], 'integer'],
			[['hari', 'nama_mata_kuliah', 'waktu_mulai', 'waktu_selesai'], 'safe'],
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
		$query = Jadwal::find();
		$query->joinWith('hari');
		// add conditions that should always apply here

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
			'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
		]);
		$dataProvider->sort->attributes['hari'] = [
			'asc' => ['hari.hari' => SORT_ASC],
			'desc' => ['hari.hari' => SORT_DESC],
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
			'hari_id' => $this->hari_id,
			'waktu_mulai' => $this->waktu_mulai,
			'waktu_selesai' => $this->waktu_selesai,
			'verifikator_id' => $this->verifikator_id,
		]);

		$query->andFilterWhere(['like', 'nama_mata_kuliah', $this->nama_mata_kuliah]);
		$query->andFilterWhere(['like', 'hari.hari', $this->hari]);

		return $dataProvider;
	}
}
