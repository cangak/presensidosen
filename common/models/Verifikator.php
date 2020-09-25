<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "verifikator".
 *
 * @property int $id
 * @property string $nama_verifikator
 * @property int $user_id
 *
 * @property Jadwal[] $jadwals
 * @property Presensi[] $presensis
 * @property User $user
 */
class Verifikator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'verifikator';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_verifikator', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['nama_verifikator'], 'string', 'max' => 255],
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
            'nama_verifikator' => 'Nama Verifikator',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Jadwals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['verifikator_id' => 'id']);
    }

    /**
     * Gets query for [[Presensis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPresensis()
    {
        return $this->hasMany(Presensi::className(), ['verifikator_id' => 'id']);
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
}
