<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "my_files".
 *
 * @property int $id
 * @property int $file_id
 * @property int $user_id
 * @property string $created_at
 */
class MyFiles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'my_files';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file_id', 'user_id'], 'required'],
            [['file_id', 'user_id'], 'default', 'value' => null],
            [['file_id', 'user_id'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file_id' => 'File ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
        ];
    }
}
