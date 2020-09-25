<?php

use yii\db\Migration;

/**
 * Class m200923_084334_isi_table_prodi
 */
class m200923_084334_isi_table_prodi extends Migration
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
    //     echo "m200923_084334_isi_table_prodi cannot be reverted.\n";

    //     return false;
    // }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        Yii::$app->db->createCommand()->batchInsert('prodi', ['id', 'nama'], [
            [1,'TEKNIK SIPIL'],
[2,'TEKNIK MESIN'],
[3,'TEKNIK LISTRIK'],
[4,'ADMINISTRASI BISNIS'],
[5,'AKUNTANSI'],
[6,'TEKNOLOGI PENGOLAHAN HASIL PERKEBUNAN'],
[7,'ARSITEKTUR'],
[8,'BUDIDAYA PERIKANAN'],
[9,'TEKNOLOGI PENANGKAPAN IKAN'],
[10,'TEKNOLOGI PENGOLAHAN HASIL PERIKANAN'],
[11,'TEKNIK ELEKTRONIKA'],
[12,'PERENCANAAN PERUMAHAN dan PEMUKIMAN'],
[13,'ADMINISTRASI NEGARA'],
[14,'AKUNTANSI'],
[15,'TEKNIK INFORMATIKA'],
[16,'OPERATOR dan; PERALATAN ALAT BERAT'],
[17,'TEKNIK MESIN'],
[18,'TEKNIK INFORMATIKA SKW'],
[19,'TEKNOLOGI PENGOLAHAN HASIL PERKEBUNAN SKW'],
[20,'TEKNIK MESIN KAMPUS KAB. POLEWALI MANDAR'],
[21,'TEKNIK PENGOLAHAN HASIL PERKEBUNAN KAMPUS KAB. POLEWALI MANDAR'],
[22,'MANAJEMEN PERKEBUNAN'],
[23,'BUDIDAYA TANAMAN PERKEBUNAN'],
[24,'TEKNIK SIPIL KAMPUS KAB. KAPUAS HULU'],
[25,'TEKNOLOGI BUDIDAYA PERIKANAN KAMPUS KAB. KAPUAS HULU'],
[26,'TEKNOLOGI PENGOLAHAN HASIL PERKEBUNAN KAMPUS KAB. KAPUAS HULU'],
[27,'ARSITEKTUR BANGUNAN GEDUNG'],
[28,'DESAIN KAWASAN BINAAN'],
[29,'ADMINISTRASI BISNIS OTOMOTIF'],
[31,'TEKNOLOGI MESIN (KAMPUS KAB. SANGGAU)'],
[32,'AKUNTANSI (KAMPUS KAB. SANGGAU)'],
[33,'PENGELOLAAN HASIL PERKEBUNAN (KAMPUS KAB. SANGGAU)'],
        ])->execute();
    }

    public function down()
    {
        echo "m200923_084334_isi_table_prodi cannot be reverted.\n";

        return false;
    }

}
