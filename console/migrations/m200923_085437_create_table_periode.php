<?php

use yii\db\Migration;

/**
 * Class m200923_085437_create_table_periode
 */
class m200923_085437_create_table_periode extends Migration
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
    //     echo "m200923_085437_create_table_periode cannot be reverted.\n";

    //     return false;
    // }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('{{%periode}}', [
            'id' => $this->primaryKey(),
            'nama' => $this->string(255),
            'keterangan' => $this->string(255),
        ]);
    }

    public function down()
    {
        echo "m200923_085437_create_table_periode cannot be reverted.\n";

        return false;
    }

}
