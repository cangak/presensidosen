<?php

use yii\db\Migration;
use common\models\Hari;

/**
 * Class m200614_164114_isi_data_hari
 */
class m200614_164114_isi_data_hari extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        Yii::$app->db->createCommand()->batchInsert('hari', ['id', 'hari'], [
            [12, 'Minggu'],
            [1, 'Senin'],
            [2, 'Selasa'],
            [3, 'Rabu'],
            [4, 'Kamis'],
            [5, 'Jumat'],
            [6, 'Sabtu'],
        ])->execute();
        Yii::$app->db->createCommand()->update('hari', ['id' => 0], 'hari = \'minggu\'')->execute();

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200614_164114_isi_data_hari cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200614_164114_isi_data_hari cannot be reverted.\n";

        return false;
    }
    */
}
