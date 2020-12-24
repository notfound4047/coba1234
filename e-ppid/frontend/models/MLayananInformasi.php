<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "m_layanan_informasi".
 *
 * @property int $id
 * @property string $jenis_layanan_informasi
 *
 * @property LayananInformasi[] $layananInformasis
 */
class MLayananInformasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'm_layanan_informasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jenis_layanan_informasi'], 'required'],
            [['jenis_layanan_informasi'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_layanan_informasi' => 'Jenis Layanan Informasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLayananInformasis()
    {
        return $this->hasMany(LayananInformasi::className(), ['kd_jenis_permohonan' => 'id']);
    }
}
