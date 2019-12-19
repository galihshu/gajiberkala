<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Siswa]].
 *
 * @see Siswa
 */
class SiswaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Siswa[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Siswa|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
