<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $superadmin
 * @property string $registration_ip
 * @property string $bind_to_ip
 * @property int $email_confirmed
 * @property string $confirmation_token
 * @property string $avatar
 * @property string $first_name
 * @property string $last_name
 * @property int $birth_day
 * @property int $birth_month
 * @property int $birth_year
 * @property int $gender
 * @property string $phone
 * @property string $skype
 * @property string $info
 *
 * @property Auth[] $auths
 * @property AuthAssignment[] $authAssignments
 * @property AuthItem[] $itemNames
 * @property Media[] $media
 * @property Media[] $media0
 * @property MediaAlbum[] $mediaAlbums
 * @property MediaAlbum[] $mediaAlbums0
 * @property MediaCategory[] $mediaCategories
 * @property MediaCategory[] $mediaCategories0
 * @property Menu[] $menus
 * @property Menu[] $menus0
 * @property MenuLink[] $menuLinks
 * @property MenuLink[] $menuLinks0
 * @property Post[] $posts
 * @property Post[] $posts0
 * @property PostCategory[] $postCategories
 * @property PostCategory[] $postCategories0
 * @property PostTag[] $postTags
 * @property PostTag[] $postTags0
 * @property Seo[] $seos
 * @property Seo[] $seos0
 * @property UserSetting[] $userSettings
 * @property UserVisitLog[] $userVisitLogs
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at', 'superadmin', 'email_confirmed', 'birth_day', 'birth_month', 'birth_year', 'gender'], 'integer'],
            [['avatar'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'bind_to_ip', 'confirmation_token', 'info'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['registration_ip'], 'string', 'max' => 15],
            [['first_name', 'last_name'], 'string', 'max' => 124],
            [['phone'], 'string', 'max' => 24],
            [['skype'], 'string', 'max' => 64],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'superadmin' => 'Superadmin',
            'registration_ip' => 'Registration Ip',
            'bind_to_ip' => 'Bind To Ip',
            'email_confirmed' => 'Email Confirmed',
            'confirmation_token' => 'Confirmation Token',
            'avatar' => 'Avatar',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'birth_day' => 'Birth Day',
            'birth_month' => 'Birth Month',
            'birth_year' => 'Birth Year',
            'gender' => 'Gender',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'info' => 'Info',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuths()
    {
        return $this->hasMany(Auth::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemNames()
    {
        return $this->hasMany(AuthItem::className(), ['name' => 'item_name'])->viaTable('auth_assignment', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedia()
    {
        return $this->hasMany(Media::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMedia0()
    {
        return $this->hasMany(Media::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediaAlbums()
    {
        return $this->hasMany(MediaAlbum::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediaAlbums0()
    {
        return $this->hasMany(MediaAlbum::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediaCategories()
    {
        return $this->hasMany(MediaCategory::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediaCategories0()
    {
        return $this->hasMany(MediaCategory::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenus0()
    {
        return $this->hasMany(Menu::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuLinks()
    {
        return $this->hasMany(MenuLink::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMenuLinks0()
    {
        return $this->hasMany(MenuLink::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts0()
    {
        return $this->hasMany(Post::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategories()
    {
        return $this->hasMany(PostCategory::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategories0()
    {
        return $this->hasMany(PostCategory::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags()
    {
        return $this->hasMany(PostTag::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostTags0()
    {
        return $this->hasMany(PostTag::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeos()
    {
        return $this->hasMany(Seo::className(), ['created_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeos0()
    {
        return $this->hasMany(Seo::className(), ['updated_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserSettings()
    {
        return $this->hasMany(UserSetting::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserVisitLogs()
    {
        return $this->hasMany(UserVisitLog::className(), ['user_id' => 'id']);
    }
}
