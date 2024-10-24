<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "translators".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $availability
 */
class Translator extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translators';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'availability'], 'required'],
            [['availability'], 'in', 'range' => ['weekdays', 'weekend']],
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
            'email' => 'Email',
            'availability' => 'Availability',
        ];
    }
}
