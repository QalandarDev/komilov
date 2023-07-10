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

    public function getIcon()
    {
        return $this->cost < 0 ? '<i class="fas fa-arrow-up text-danger"></i>' : '<i class="fas fa-arrow-down text-success"></i>';
    }

    public function getCost()
    {
        //formatter as currency
        //get sign + or - in front of the number
        $sign = $this->cost < 0 ? '-' : '+';
        $cost = abs($this->cost);
        //get the number without the sign
        return $sign . Yii::$app->formatter->asDecimal($cost, 0);
    }

    public function getLiClass()
    {
        return $this->cost < 0 ? 'list-group-item-danger' : 'list-group-item-success';
    }
}
