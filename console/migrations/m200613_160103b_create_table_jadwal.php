<?php

use yii\db\Schema;

class m200613_160103b_create_table_jadwal extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('jadwal', [
            'id' => $this->primaryKey(),
            'nama_mata_kuliah' => $this->string(255)->notNull(),
            'hari_id' => $this->integer(11)->notNull(),
            'waktu_mulai' => $this->time()->notNull(),
            'waktu_selesai' => $this->time()->notNull(),
            'verifikator_id' => $this->integer(11)->null(),
            'FOREIGN KEY ([[hari_id]]) REFERENCES hari ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[verifikator_id]]) REFERENCES verifikator ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('jadwal');
    }
}
