<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_duties".
 *
 * @property int $id
 * @property int $user_id
 * @property int $duties_id
 *
 * @property Duties $duties
 * @property Users $user
 */
class UserDuties extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_duties';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'duties_id'], 'integer'],
            [['duties_id'], 'exist', 'skipOnError' => true, 'targetClass' => Duties::className(), 'targetAttribute' => ['duties_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UserRegistration::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'duties_id' => 'Duties ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDuties()
    {
        return $this->hasOne(Duties::className(), ['id' => 'duties_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(UserRegistration::className(), ['id' => 'user_id']);
    }
}
