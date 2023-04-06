<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

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
class Documents extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documents';
    }

    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
                'slugAttribute' => 'slug',
                'attribute' => 'name',
                'ensureUnique' => true,
                'replacement' => '_',
                'lowercase' => true,
                'immutable' => false,
            ],
            BlameableBehavior::class,
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date('Y-m-d H:i:s'),
            ]
        ];

    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'name', 'category_id', 'subject_id'], 'required'],
            [['downloads', 'views', 'status', 'category_id', 'subject_id', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['downloads', 'views', 'status', 'category_id', 'subject_id', 'created_by', 'updated_by'], 'integer'],
            [['file','image'],'default','value'=>''],
            [['created_at', 'updated_at'], 'safe'],
            [['slug', 'name', 'file', 'image'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['views','downloads'],'default','value'=>0],
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
