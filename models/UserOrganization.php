<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_organization".
 *
 * @property int $id
 * @property int $user_id
 * @property int $organization_id
 *
 * @property Users $user
 * @property Organization $organization
 */
class UserOrganization extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_organization';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'organization_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRegistration::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['organization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Organization::className(), 'targetAttribute' => ['organization_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'organization_id' => 'Organization ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserRegistration::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['id' => 'organization_id']);
    }
    public function getUsers() {
    return $this->hasMany(UserRegistration::className(),['user_id' => 'id'] )->viaTable(
        'user_organization', ['id' => 'organization_id']);
}
}
