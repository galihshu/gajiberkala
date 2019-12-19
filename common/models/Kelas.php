<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "kelas".
 *
 * @property int $id
 * @property string $nama_kelas
 *
 * @property Siswa[] $siswas
 */
class Kelas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_kelas'], 'required'],
            [['nama_kelas'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_kelas' => 'Nama Kelas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSiswas()
    {
        return $this->hasMany(Siswa::className(), ['kelas_id' => 'id']);
    }

    public function getJumlahSiswa()
    {
        return $this->getSiswas()->count();
    }

    /**
     * {@inheritdoc}
     * @return KelasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KelasQuery(get_called_class());
    }
}
