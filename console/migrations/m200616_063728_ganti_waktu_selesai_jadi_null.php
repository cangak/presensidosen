<?php

use yii\db\Migration;

/**
 * Class m200616_063728_ganti_waktu_selesai_jadi_null
 */
class m200616_063728_ganti_waktu_selesai_jadi_null extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // ALTER TABLE `presensi` CHANGE `waktu_selesai` `waktu_selesai` datetime NULL AFTER `waktu_mulai`
        Yii::$app->db->createCommand('ALTER TABLE `presensi` CHANGE `waktu_selesai` `waktu_selesai` datetime NULL AFTER `waktu_mulai`')
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200616_063728_ganti_waktu_selesai_jadi_null cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200616_063728_ganti_waktu_selesai_jadi_null cannot be reverted.\n";

        return false;
    }
    */
}
