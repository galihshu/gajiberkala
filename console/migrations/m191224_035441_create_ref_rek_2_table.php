<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ref_rek_2}}`.
 */
class m191224_035441_create_ref_rek_2_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ref_rek_2}}', [
            'kd_rek_1' => $this->tinyInteger()->notNull(),
            'kd_rek_2' => $this->tinyInteger()->notNull(),
            'kd_opd' => $this->tinyInteger()->notNull(),
            'kd_sub_opd' => $this->tinyInteger()->notNull(),
            'nm_rek_2' => $this->string(100),
        ]);
        $this->addPrimaryKey('ref_rek_2_pkey','ref_rek_2',['kd_rek_1','kd_rek_2','kd_opd','kd_sub_opd']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ref_rek_2}}');
    }
}
