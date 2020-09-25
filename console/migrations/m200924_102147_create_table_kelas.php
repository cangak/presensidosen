<?php

use yii\db\Migration;

/**
 * Class m200924_102147_create_table_kelas
 */
class m200924_102147_create_table_kelas extends Migration
{
    /**
     * {@inheritdoc}
     */
    // public function safeUp()
    // {

    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function safeDown()
    // {
    //     echo "m200924_102147_create_table_kelas cannot be reverted.\n";

    //     return false;
    // }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%kelas}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255),
            'created_at' => $this->TIMESTAMP(),
            'updated_at' => $this->TIMESTAMP(),
            'periode_id' => $this->integer()->notNull(),
            'prodi_id' => $this->integer()->notNull(),
        ]);
        $this->createIndex(
            'fk_kelas_periode1_idx',
            'kelas',
            'periode_id'
        );
        $this->addForeignKey(
            'fk_kelas_periode1',
            'kelas',
            'periode_id',
            'periode',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'fk_kelas_prodi1_idx',
            'kelas',
            'prodi_id'
        );
        $this->addForeignKey(
            'fk_kelas_prodi1',
            'kelas',
            'prodi_id',
            'prodi',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m200924_102147_create_table_kelas cannot be reverted.\n";

        return false;
    }

}
