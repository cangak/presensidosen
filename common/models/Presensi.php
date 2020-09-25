<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "presensi".
 *
 * @property int $id
 * @property int $jadwal_id
 * @property string $waktu_mulai
 * @property string|null $waktu_selesai
 * @property int $dosen_id
 * @property string|null $pokok_bahasan
 * @property string|null $laporan_kejadian

 * @property int $status_verifikasi
 * @property int $verifikator_id
 *
 * @property Jadwal $jadwal
 * @property Dosen $dosen
 * @property Verifikator $verifikator
 */
class Presensi extends \yii\db\ActiveRecord
{

    const PRESENSI_MASUK = 1;
    const PRESENSI_KELUAR = 2;
    const TERVERIFIKASI = 3;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'presensi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jadwal_id', 'waktu_mulai', 'dosen_id', 'status_verifikasi', 'verifikator_id'], 'required'],
            [['jadwal_id', 'dosen_id', 'status_verifikasi', 'verifikator_id'], 'integer'],
            [['waktu_mulai', 'waktu_selesai'], 'safe'],
            [['pokok_bahasan', 'laporan_kejadian'], 'string'],
            [['jadwal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['jadwal_id' => 'id']],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
            [['verifikator_id'], 'exist', 'skipOnError' => true, 'targetClass' => Verifikator::className(), 'targetAttribute' => ['verifikator_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jadwal_id' => 'Jadwal ID',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
            'dosen_id' => 'Dosen ID',
            'pokok_bahasan' => 'Bahan Kajian',
            'laporan_kejadian' => 'Laporan Kejadian',
            'status_verifikasi' => 'Status Verifikasi',
            'verifikator_id' => 'Verifikator ID',
        ];
    }

    /**
     * Gets query for [[Jadwal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwal()
    {
        return $this->hasOne(Jadwal::className(), ['id' => 'jadwal_id']);
    }

    /**
     * Gets query for [[Dosen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDosen()
    {
        return $this->hasOne(Dosen::className(), ['id' => 'dosen_id']);
    }

    /**
     * Gets query for [[Verifikator]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVerifikator()
    {
        return $this->hasOne(Verifikator::className(), ['id' => 'verifikator_id']);
    }
}
