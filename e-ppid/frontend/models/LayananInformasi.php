<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "layanan_informasi".
 *
 * @property int $id
 * @property string $created_date
 * @property int $kd_jenis_permohonan
 * @property int $id_user
 * @property string $kebutuhan_informasi
 * @property string $tujuan_kebutuhan_informasi
 * @property int $id_status 0: belum dijawab; 1:eskalasi; 2:terjawab; 9:closed
 * @property string $last_update
 * @property string $jawaban
 * @property string $tanggal_jawaban
 * @property int $id_admin
 *
 * @property HistoryLayananInformasi[] $historyLayananInformasis
 * @property MLayananInformasi $kdJenisPermohonan
 * @property MStatus $status
 */
class LayananInformasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'layanan_informasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_date', 'last_update', 'tanggal_jawaban'], 'safe'],
            [['kd_jenis_permohonan', 'id_user', 'kebutuhan_informasi', 'tujuan_kebutuhan_informasi'], 'required'],
            [['kd_jenis_permohonan', 'id_user', 'id_status', 'id_admin'], 'integer'],
            [['kebutuhan_informasi', 'tujuan_kebutuhan_informasi', 'jawaban'], 'string'],
            [['kd_jenis_permohonan'], 'exist', 'skipOnError' => true, 'targetClass' => MLayananInformasi::className(), 'targetAttribute' => ['kd_jenis_permohonan' => 'id']],
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
            'created_date' => 'Created Date',
            'kd_jenis_permohonan' => 'Jenis Permohonan Informasi',
            'id_user' => 'Id User',
            'kebutuhan_informasi' => 'Kebutuhan Informasi',
            'tujuan_kebutuhan_informasi' => 'Tujuan Kebutuhan Informasi',
            'id_status' => 'Id Status',
            'last_update' => 'Last Update',
            'jawaban' => 'Jawaban',
            'tanggal_jawaban' => 'Tanggal Jawaban',
            'id_admin' => 'Id Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoryLayananInformasis()
    {
        return $this->hasMany(HistoryLayananInformasi::className(), ['id_layanan_informasi' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdJenisPermohonan()
    {
        return $this->hasOne(MLayananInformasi::className(), ['id' => 'kd_jenis_permohonan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(MStatus::className(), ['id' => 'id_status']);
    }
}
