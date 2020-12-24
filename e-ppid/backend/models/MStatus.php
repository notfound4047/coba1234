<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_status".
 *
 * @property int $id
 * @property string $nama_status
 *
 * @property LayananInformasi[] $layananInformasis
 */
class MStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_status'], 'required'],
            [['nama_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_status' => 'Nama Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLayananInformasis()
    {
        return $this->hasMany(LayananInformasi::className(), ['id_status' => 'id']);
    }
}
