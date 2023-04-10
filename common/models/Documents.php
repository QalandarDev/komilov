<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;

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
 * @property-read Category $category
 * @property-read Subjects $subject
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

            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => date('Y-m-d H:i:s'),
            ],
            [
                'class' => BlameableBehavior::class,
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
                'defaultValue' => 1,
            ]
        ];

    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'subject_id'], 'required'],
            [['downloads', 'views', 'status', 'category_id', 'subject_id', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['downloads', 'views', 'status', 'category_id', 'subject_id', 'created_by', 'updated_by'], 'integer'],
            [['image'], 'default', 'value' => ''],
            [['created_at', 'updated_at'], 'safe'],
            [['slug', 'name', 'file', 'image'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['views', 'downloads'], 'default', 'value' => 0],
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

    final public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    final public function getSubject(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Subjects::class, ['id' => 'subject_id']);
    }

    final public function saveFile(string $default=null): void
    {

        //get uploaded file instance
        if (UploadedFile::getInstance($this, 'file') === null) {
            $this->file = $default;
            return;
        }
        $this->file = UploadedFile::getInstance($this, 'file');

        //save file with /category/subject/year_month/slug.ext to @file dir before save check dir if not exist create it
        $dir = Yii::getAlias('@file') . '/' . $this->category->slug . '/' . $this->subject->slug . '/' . date('Y_m');
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        //save file
        $this->file->saveAs($dir . '/' . $this->file->baseName . '.' . $this->file->extension);
        //encrypt file name
        $this->file = $this->file->baseName . '.' . $this->file->extension;
    }

    final public function getFile(): string
    {
        $model = Documents::findOne($this->id);
        $model->downloads++;
        $model->save();
        return Yii::getAlias('@file') . '/' . $this->category->slug . '/' . $this->subject->slug . '/' . date('Y_m') . '/' . $this->file;

    }

    final public function saveImage(string $default=null): void
    {
        //get uploaded file instance
        if (UploadedFile::getInstance($this, 'image') === null) {
            $this->image = $default;
            return;
        }
        $this->image = UploadedFile::getInstance($this, 'image');
        $dir = Yii::getAlias('@image') . '/' . $this->category->slug . '/' . $this->subject->slug . '/' . date('Y_m');
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }
        //save file
        $this->image->saveAs($dir . '/' . $this->image->baseName . '.' . $this->image->extension);
        //encrypt file name
        $this->image = $this->image->baseName . '.' . $this->image->extension;
    }
}
