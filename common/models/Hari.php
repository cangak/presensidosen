<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hari".
 *
 * @property int $id
 * @property string $hari
 *
 * @property Jadwal[] $jadwals
 */
class Hari extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hari';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hari'], 'required'],
            [['hari'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hari' => 'Hari',
        ];
    }

    /**
     * Gets query for [[Jadwals]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwals()
    {
        return $this->hasMany(Jadwal::className(), ['hari_id' => 'id']);
    }
}
