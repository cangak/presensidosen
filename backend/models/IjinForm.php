<?php

namespace backend\models;

use common\models\Ijin;
use common\models\Dosen;
use yii\base\Model;
use common\models\Jadwal;
use yii\web\UploadedFile;

class IjinForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
    public $tanggal;
    public $jadwal_id;
    public $keterangan;
    public $dosen_id;
    public $file_surat;

    public function rules()
    {
        return [
            [['tanggal'], 'safe'],
            [['jadwal_id'], 'required'],
            [['jadwal_id', 'dosen_id'], 'integer'],
            [['keterangan', 'file_surat'], 'string', 'max' => 255],
            [['jadwal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Jadwal::className(), 'targetAttribute' => ['jadwal_id' => 'id']],
            [['dosen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dosen::className(), 'targetAttribute' => ['dosen_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'jadwal_id' => 'Jadwal',
            'keterangan' => 'Keterangan',
            'file_surat' => 'File Surat',
            'dosen_id' => 'Dosen',
            'imageFile' => 'File Surat',
        ];
    }

    public function simpan()
    {
        $ijin = new Ijin();
        if ($this->validate()) {
            $file_name =  date('Ymdhis') . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs('uploads/' . $file_name);
            $ijin->tanggal = $this->tanggal;
            $ijin->jadwal_id = $this->jadwal_id;
            $ijin->dosen_id = $this->dosen_id;
            $ijin->keterangan = $this->keterangan;
            $ijin->file_surat = $file_name;
            $ijin->save();
            return true;
        } else {
            return false;
        }
    }
}
