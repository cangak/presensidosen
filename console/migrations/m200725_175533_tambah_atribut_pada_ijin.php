<?php

use yii\db\Migration;

/**
 * Class m200725_175533_tambah_atribut_pada_ijin
 */
class m200725_175533_tambah_atribut_pada_ijin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand('ALTER TABLE `ijin`
ADD `dosen_id` int(11) NULL,
ADD FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE CASCADE')
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200725_175533_tambah_atribut_pada_ijin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200725_175533_tambah_atribut_pada_ijin cannot be reverted.\n";

        return false;
    }
    */
}
