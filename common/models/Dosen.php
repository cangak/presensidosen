<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "dosen".
 *
 * @property int $id
 * @property string $nama_dosen
 * @property int $no_hp
 * @property int $user_id
 *
 * @property User $user
 * @property JadwalDosen[] $jadwalDosens
 * @property Presensi[] $presensis
 */
class Dosen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dosen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_dosen', 'no_hp'], 'required'],
            [['user_id','no_hp'], 'integer'],
            [['nama_dosen'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[JadwalDosens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalDosens()
    {
        return $this->hasMany(JadwalDosen::className(), ['dosen_id' => 'id']);
    }

    /**
     * Gets query for [[Presensis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPresensis()
    {
        return $this->hasMany(Presensi::className(), ['dosen_id' => 'id']);
    }
}
