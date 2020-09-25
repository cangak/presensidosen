<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "jadwal".
 *
 * @property int $id
 * @property string $nama_mata_kuliah
 * @property float $sks
 * @property int $hari_id
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 * @property int|null $verifikator_id
 *
 * @property Hari $hari
 * @property Verifikator $verifikator
 * @property JadwalDosen[] $jadwalDosens
 * @property Presensi[] $presensis
 */
class Jadwal extends \yii\db\ActiveRecord {
	/**
	 * {@inheritdoc}
	 */
	public static function tableName() {
		return 'jadwal';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules() {
		return [
			[['nama_mata_kuliah', 'hari_id', 'sks', 'waktu_mulai', 'waktu_selesai'], 'required'],
			[['hari_id', 'verifikator_id'], 'integer'],
			[['sks'], 'number'],
			[['waktu_mulai', 'waktu_selesai'], 'safe'],
			[['nama_mata_kuliah'], 'string', 'max' => 255],
			[['hari_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hari::className(), 'targetAttribute' => ['hari_id' => 'id']],
			[['verifikator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Verifikator::className(), 'targetAttribute' => ['verifikator_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',
			'nama_mata_kuliah' => 'Nama Mata Kuliah',
			'hari_id' => 'Hari',
			'sks' => 'SKS',
			'waktu_mulai' => 'Waktu Mulai',
			'waktu_selesai' => 'Waktu Selesai',
			'verifikator_id' => 'Verifikator ID',
		];
	}
	public static function berdasarkanDosen($id_dosen) {
		$jadwal = Yii::$app->db
			->createCommand('SELECT * FROM jadwal_dosen
                                LEFT JOIN jadwal ON jadwal.id = jadwal_dosen.jadwal_id
                                LEFT JOIN dosen ON dosen.id = jadwal_dosen.dosen_id
                                LEFT JOIN hari ON hari.id = jadwal.hari_id
                                WHERE jadwal_dosen.dosen_id=:id_dosen and hari.id=:hari')
			->bindValue(':id_dosen', $id_dosen)
			->bindValue(':hari', date('w'))
			->queryAll();
		return $jadwal;
	}
	/**
	 * Gets query for [[Hari]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getHari() {
		return $this->hasOne(Hari::className(), ['id' => 'hari_id']);
	}

	/**
	 * Gets query for [[Verifikator]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getVerifikator() {
		return $this->hasOne(Verifikator::className(), ['id' => 'verifikator_id']);
	}

	/**
	 * Gets query for [[JadwalDosens]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getJadwalDosens() {
		return $this->hasMany(JadwalDosen::className(), ['jadwal_id' => 'id']);
	}

	/**
	 * Gets query for [[Presensis]].
	 *
	 * @return \yii\db\ActiveQuery
	 */
	public function getPresensis() {
		return $this->hasMany(Presensi::className(), ['jadwal_id' => 'id']);
	}
}
