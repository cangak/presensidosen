<?php

use yii\db\Schema;

class m200613_160104_create_table_jadwal_dosen extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('jadwal_dosen', [
            'id' => $this->primaryKey(),
            'jadwal_id' => $this->integer(11)->notNull(),
            'dosen_id' => $this->integer(11)->notNull(),
            'FOREIGN KEY ([[jadwal_id]]) REFERENCES jadwal ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
            'FOREIGN KEY ([[dosen_id]]) REFERENCES dosen ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('jadwal_dosen');
    }
}
