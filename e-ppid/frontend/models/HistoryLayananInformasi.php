<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "history_layanan_informasi".
 *
 * @property int $id
 * @property string $tanggal
 * @property int $id_status
 * @property int $id_user
 * @property string $remarks
 * @property int $id_layanan_informasi
 *
 * @property LayananInformasi $layananInformasi
 * @property MStatus $status
 */
class HistoryLayananInformasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history_layanan_informasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal'], 'safe'],
            [['id_status', 'id_user', 'remarks', 'id_layanan_informasi'], 'required'],
            [['id_status', 'id_user', 'id_layanan_informasi'], 'integer'],
            [['remarks'], 'string', 'max' => 255],
            [['id_layanan_informasi'], 'exist', 'skipOnError' => true, 'targetClass' => LayananInformasi::className(), 'targetAttribute' => ['id_layanan_informasi' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => MStatus::className(), 'targetAttribute' => ['id_status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'id_status' => 'Id Status',
            'id_user' => 'Id User',
            'remarks' => 'Remarks',
            'id_layanan_informasi' => 'Id Layanan Informasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLayananInformasi()
    {
        return $this->hasOne(LayananInformasi::className(), ['id' => 'id_layanan_informasi']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(MStatus::className(), ['id' => 'id_status']);
    }
    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\yeesoft\models\User::className(), ['id' => 'id_user']);
    }
    
}
