<?php

use yii\db\Schema;

class m200613_160105_create_table_presensi extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('presensi', [
            'id' => $this->primaryKey(),
            'jadwal_id' => $this->integer(11)->notNull(),
            'waktu_mulai' => $this->datetime()->notNull(),
            'waktu_selesai' => $this->datetime()->notNull(),
            'dosen_id' => $this->integer(11)->notNull(),
            'pokok_bahasan' => $this->text(),
            'status_verifikasi' => $this->tinyInteger(4)->notNull(),
            'verifikator_id' => $this->integer(11)->notNull(),
            'FOREIGN KEY ([[jadwal_id]]) REFERENCES jadwal ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[dosen_id]]) REFERENCES dosen ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[verifikator_id]]) REFERENCES verifikator ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('presensi');
    }
}
