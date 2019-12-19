<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "siswa".
 *
 * @property int $id
 * @property string $nis
 * @property string $nama
 * @property string $tglhr
 * @property int $kelas_id
 * @property int $gaji_ortu
 *
 * @property Kelas $kelas
 */
class Siswax extends \yii\db\ActiveRecord
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
            [['nis', 'nama', 'tglhr', 'kelas_id', 'gaji_ortu'], 'required'],
            [['tglhr'], 'safe'],
            [['kelas_id', 'gaji_ortu'], 'integer'],
            [['nis'], 'string', 'max' => 15],
            [['nama'], 'string', 'max' => 200],
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
            'gaji_ortu' => 'Gaji Ortu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKelas()
    {
        return $this->hasOne(Kelas::className(), ['id' => 'kelas_id']);
    }
}
