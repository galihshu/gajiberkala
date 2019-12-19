<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property int $id
 * @property string $nis
 * @property string $nama
 * @property int $kelas_id
 *
 * @property Kelas $kelas
 */
class Siswa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siswa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nis', 'nama', 'kelas_id'], 'required'],
            [['kelas_id'], 'integer'],
            [['nis'], 'string', 'max' => 15],
            [['nama'], 'string', 'max' => 200],
            [['tglhr'],'safe'],
            [['gaji_ortu'],'integer'],
            [['kelas_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kelas::className(), 'targetAttribute' => ['kelas_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nis' => 'Nis',
            'nama' => 'Nama',
            'tglhr' => 'Tglhr',
            'kelas_id' => 'Kelas ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasOne(Kelas::className(), ['id' => 'kelas_id']);
    }

    /**
     * {@inheritdoc}
     * @return SiswaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SiswaQuery(get_called_class());
    }
}
