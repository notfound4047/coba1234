<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "berkas".
 *
 * @property int $id
 * @property int $id_user
 * @property string $isi_berkas
 * @property string $link_berkas
 *
 * @property User $user
 */
class Berkas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'berkas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'link_berkas'], 'required'],
            [['id_user'], 'integer'],
            [['link_berkas'], 'string'],
            [['isi_berkas'], 'string', 'max' => 255],
            //[['id_user'], 'exist', 'skipOnError' => true, 'targetClass' =>  \yeesoft\models\User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'isi_berkas' => 'Isi Berkas',
            'link_berkas' => 'Link Berkas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\yeesoft\models\User::className(), ['id' => 'id_user']);
    }
}
