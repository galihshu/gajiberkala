<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "akun3".
 *
 * @property int $kd_akun1
 * @property int $kd_akun2
 * @property int $kd_akun3
 * @property string|null $akun3
 */
class Akun3 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akun3';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_akun1', 'kd_akun2', 'kd_akun3'], 'required'],
            [['kd_akun1', 'kd_akun2', 'kd_akun3'], 'integer'],
            [['akun3'], 'string', 'max' => 100],
            [['kd_akun1', 'kd_akun2', 'kd_akun3'], 'unique', 'targetAttribute' => ['kd_akun1', 'kd_akun2', 'kd_akun3']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kd_akun1' => 'Kd Akun1',
            'kd_akun2' => 'Kd Akun2',
            'kd_akun3' => 'Kd Akun3',
            'akun3' => 'Akun3',
        ];
    }
}
