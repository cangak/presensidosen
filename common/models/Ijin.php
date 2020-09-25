<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "ijin".
 *
 * @property int $id
 * @property string|null $tanggal
 * @property int $jadwal_id
 * @property string|null $keterangan
 * @property string|null $file_surat
 * @property int|null $dosen_id
 *
 * @property Jadwal $jadwal
 * @property Dosen $dosen
 */
class Ijin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ijin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal'], 'safe'],
            [['jadwal_id'], 'required'],
            [['jadwal_id', 'dosen_id'], 'integer'],
            [['keterangan', 'file_surat'], 'string', 'max' => 255],
            [['jadwal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['jadwal_id' => 'id']],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'jadwal_id' => 'Jadwal',
            'keterangan' => 'Keterangan',
            'file_surat' => 'File Surat',
            'dosen_id' => 'Dosen',
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
}
