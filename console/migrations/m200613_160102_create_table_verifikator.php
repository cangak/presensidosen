<?php

use yii\db\Schema;

class m200613_160102_create_table_verifikator extends \yii\db\Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('verifikator', [
            'id' => $this->primaryKey(),
            'nama_verifikator' => $this->string(255)->notNull(),
            'user_id' => $this->integer(11)->notNull(),
            'FOREIGN KEY ([[user_id]]) REFERENCES user ([[id]]) ON DELETE CASCADE ON UPDATE CASCADE',
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('verifikator');
    }
}
