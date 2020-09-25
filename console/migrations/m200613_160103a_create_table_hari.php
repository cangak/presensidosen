<?php

use yii\db\Migration;

/**
 * Class m200614_161904_create_table_hari
 */
class m200613_160103a_create_table_hari extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        
        $this->createTable('hari', [
            'id' => $this->primaryKey(),
            'hari' => $this->string(255)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200614_161904_create_table_hari cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200614_161904_create_table_hari cannot be reverted.\n";

        return false;
    }
    */
}
