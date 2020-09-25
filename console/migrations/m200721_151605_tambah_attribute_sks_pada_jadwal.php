<?php

use yii\db\Migration;

/**
 * Class m200721_151605_tambah_attribute_sks_pada_jadwal
 */
class m200721_151605_tambah_attribute_sks_pada_jadwal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand('ALTER TABLE `jadwal` ADD `sks` decimal(2,1) NOT NULL AFTER `nama_mata_kuliah`')
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200721_151605_tambah_attribute_sks_pada_jadwal cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200721_151605_tambah_attribute_sks_pada_jadwal cannot be reverted.\n";

        return false;
    }
    */
}
