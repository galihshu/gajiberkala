<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%akun3}}`.
 */
class m191224_061158_create_akun3_table extends Migration
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

        $this->createTable('{{%akun3}}', [
            'kd_akun1' =>$this->integer()->notNull(),
            'kd_akun2' => $this->integer()->notNull(),
            'kd_akun3' => $this->integer()->notNull(),
            'akun3' => $this->string(100)
        ], $tableOptions);

        $this->addPrimaryKey('akun3_pkey', 'akun3', ['kd_akun1', 'kd_akun2', 'kd_akun3']);

        $this->batchInsert(
            'akun3', 
            [
                'kd_akun1',
                'kd_akun2',
                'kd_akun3',
                'akun3'
            ], 
            [
                ['1', '11','112', 'Piutang Usaha'],
                ['1', '11','115', 'Persediaan'],
                ['1', '11','116', 'Bahan Habis Pakai'],
                ['1', '11','117', 'Asuransi Dibayar di Muka'],
                ['1','12','123', 'Peralatan Toko'],
                ['1','12','124', 'Akumulasi Penyusutan Peralatan Toko'],
                ['1','12','125', 'Peralatan Kantor'],
                ['1','12','126', 'Akumulasi Penyusutan Peralatan Kantor'],
                ['2','21','211', 'Utang Gaji'],
                ['2','21','212', 'Sewa Diterima di Muka'],
                ['2','21','215', 'Wesel Bayar'],
                ['3','31','311', 'Prive'],
                ['3','31','312', 'Ikhtisar Laba Rugi'],
                ['4','41','411', 'Retur dan Potongan Penjualan'],
                ['4','41','412', 'Diskon Penjualan'],
                ['5','51','511', 'Harga Pokok Penjualan'],
                ['5','52','521', 'Beban Iklan'],
                ['5','52','522', 'Beban Penyusutan Peralatan Toko'],
                ['5','52','523', 'Ongkos Kirim Penjualan'],
                ['5','52','529', 'Beban Penjualan Lain-lain'],
                ['5','53','531', 'Beban Sewa'],
                ['5','53','532', 'Beban Penyusutan Peralatan Kantor'],
                ['5','53','533', 'Beban Asuransi'],
                ['5','53','534', 'Beban Bahan Habis Pakai'],
                ['5','53','539', 'Beban Administrasi Lain-lain'],
               ['6','61','611', 'Pendapatan Sewa'],
               ['7','71','711','Beban Bunga']
            
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%akun3}}');
    }
}
