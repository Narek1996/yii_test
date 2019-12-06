<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 */
class UserRegistration extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email'],'required'],
            [['name', 'surname', 'email'],'string', 'max' => 50],
            ['email','email']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
        ];
    }

    public function getOrganization() {
        return $this->hasMany(Organization::className(), ['id' => 'organization_id'])->viaTable(
            'user_organization', ['user_id' => 'id']);
    }

    public function getDuties() {
        return $this->hasMany(Duties::className(), ['id' => 'duties_id'])->viaTable(
            'user_duties', ['user_id' => 'id']);
    }


}
