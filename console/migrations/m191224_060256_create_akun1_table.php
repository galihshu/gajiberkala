<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%akun1}}`.
 */
class m191224_060256_create_akun1_table extends Migration
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

        $this->createTable('{{%akun1}}', [
            'kd_akun1' => $this->integer()->notNull(),
            'akun1' => $this->string(100),
        ], $tableOptions);
        $this->addPrimaryKey('akun1_pkey','akun1',['kd_akun1']);

        $this->batchInsert(
            'akun1', 
            [
                'kd_akun1',
                'akun1'
            ], 
            [
                ['1', 'Aset'],
                ['2', 'Kewajiban'],
                ['3', 'Ekuitas Pemilik'],
                ['4', 'Pendapatan'],
                ['5', 'Biaya dan Beban'],
                ['6', 'Pendapatan Lainnya'],
                ['7',' Beban Lainnya']
                
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%akun1}}');
    }
}
