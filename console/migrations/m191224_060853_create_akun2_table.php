<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%akun2}}`.
 */
class m191224_060853_create_akun2_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%akun2}}', [
            'kd_akun1' => $this->integer()->notNull(),
            'kd_akun2' => $this->integer()->notNull(),
            'akun2' => $this->string(100),
        ], $tableOptions);

        $this->addPrimaryKey('akun2_pkey','akun2',['kd_akun1','kd_akun2']);

        $this->batchInsert(
            'akun2', 
            [
                'kd_akun1',
                'kd_akun2',
                'akun2'
            ], 
            [
               ['1', '11', 'Kas'],
               ['1','12', 'Tanah'],
               ['2','21', 'Utang Usaha'],
               ['3','31', 'Modal'],
               ['4','41', 'Penjualan'],
               ['5','51', 'Harga Pokok Penjualan'],
               ['5','52', 'Beban Gaji Penjualan'],
               ['5','53', 'Beban Gaji Kantor'],
               ['6','61', 'Pendapatan Sewa'],
               ['7','71','Beban Bunga']
            
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%akun2}}');
    }
}
