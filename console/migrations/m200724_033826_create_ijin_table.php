<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ijin}}`.
 */
class m200724_033826_create_ijin_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ijin}}', [
            'id' => $this->primaryKey(),
            'tanggal' => $this->date(),
            'jadwal_id' => $this->integer()->notNull(),
            'keterangan' => $this->string(255),
            'file_surat' => $this->string(255),
        ]);

        $this->createIndex(
            'idx-ijin-jadwal-id',
            'ijin',
            'jadwal_id'
        );
        $this->addForeignKey(
            'fk-ijin-jadwal-id',
            'ijin',
            'jadwal_id',
            'jadwal',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ijin}}');
    }
}
