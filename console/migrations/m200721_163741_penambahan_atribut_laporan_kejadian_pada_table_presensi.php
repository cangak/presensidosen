<?php

use yii\db\Migration;

/**
 * Class m200721_163741_penambahan_atribut_laporan_kejadian_pada_table_presensi
 */
class m200721_163741_penambahan_atribut_laporan_kejadian_pada_table_presensi extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $query = "ALTER TABLE `presensi` ADD `laporan_kejadian` text COLLATE 'utf8_general_ci' NULL AFTER `status_verifikasi`";
        Yii::$app->db->createCommand($query)
            ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200721_163741_penambahan_atribut_laporan_kejadian_pada_table_presensi cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200721_163741_penambahan_atribut_laporan_kejadian_pada_table_presensi cannot be reverted.\n";

        return false;
    }
    */
}
