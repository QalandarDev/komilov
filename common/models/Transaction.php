<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property string|null $from
 * @property string|null $to
 * @property int|null $cost
 * @property string|null $message
 * @property string|null $time
 */
class Transaction extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transaction';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cost'], 'default', 'value' => null],
            [['cost'], 'integer'],
            [['message'], 'string'],
            [['time'], 'safe'],
            [['from', 'to'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'to' => 'To',
            'cost' => 'Cost',
            'message' => 'Message',
            'time' => 'Time',
        ];
    }
}
