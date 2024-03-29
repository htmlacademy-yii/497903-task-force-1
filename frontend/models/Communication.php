<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "communication".
 *
 * @property int $id
 * @property string|null $phone
 * @property string|null $skype
 * @property string|null $telegram
 */
class Communication extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'communication';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'string', 'max' => 11],
            [['skype', 'telegram'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'skype' => 'Skype',
            'telegram' => 'Telegram',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CommunicationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommunicationQuery(get_called_class());
    }
}
