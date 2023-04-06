<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "documents".
 *
 * @property int $id
 * @property string $slug
 * @property string $name
 * @property string $file
 * @property string $image
 * @property int $downloads
 * @property int $views
 * @property int $status
 * @property int $category_id
 * @property int $subject_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property int $updated_by
 */
class Documents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slug', 'name', 'category_id', 'subject_id'], 'required'],
            [['downloads', 'views', 'status', 'category_id', 'subject_id', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['downloads', 'views', 'status', 'category_id', 'subject_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['slug', 'name', 'file', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'file' => 'File',
            'image' => 'Image',
            'downloads' => 'Downloads',
            'views' => 'Views',
            'status' => 'Status',
            'category_id' => 'Category ID',
            'subject_id' => 'Subject ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
