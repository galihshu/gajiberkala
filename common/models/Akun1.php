<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "akun1".
 *
 * @property int $kd_akun1
 * @property string|null $akun1
 */
class Akun1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'akun1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kd_akun1'], 'required'],
            [['kd_akun1'], 'integer'],
            [['akun1'], 'string', 'max' => 100],
            [['kd_akun1'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kd_akun1' => 'Kd Akun1',
            'akun1' => 'Akun1',
        ];
    }
}
