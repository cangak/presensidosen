<?php

use yii\db\Schema;

class m200613_160101_create_table_dosen extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('dosen', [
            'id' => $this->primaryKey(),
            'nama_dosen' => $this->string(255)->notNull(),
            'no_hp' => $this->string(13)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'FOREIGN KEY ([[user_id]]) REFERENCES user ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('dosen');
    }
}
