<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\Url;
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
 * @property int $category_id
 * @property int $subject_id
 * @property string $created_at
 * @property string $updated_at
 * @property int $created_by
 * @property-read Category $category
 * @property-read Subjects $subject
 * @property-read string $uploadTime
 * @property-read string $downloadFile
 * @property-read string $fileSize
 * @property-read string $imageFile
 * @property-read string $imageLink
 * @property-read string $fileLink
 * @property-read string $fileName
 * @property int $updated_by
 * @property float $price
 * @property-read mixed $imageAdminLink
 * @property-read string $fileAdminLink
 * @property bool $status
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
            [['slug', 'name', 'category_id', 'subject_id'], 'required'],
            [['downloads', 'views', 'category_id', 'subject_id', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['downloads', 'views', 'category_id', 'subject_id', 'created_by', 'updated_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['price'], 'number'],
            [['status'], 'boolean'],
            [['slug', 'name', 'file', 'image'], 'string', 'max' => 255],
            [['slug'], 'unique'],
            [['views', 'downloads'], 'default', 'value' => 0],
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
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

    final public function saveFile(string $default = null): void
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

    final public function getDownloadFile(bool $download = false): string
    {
        $model = Documents::findOne($this->id);
        if ($download) $model->downloads++;
        $model->save();
        return Yii::getAlias('@file') . '/' . $this->category->slug . '/' . $this->subject->slug . '/' . date('Y_m',strtotime($model->created_at)) . '/' . $this->file;

    }

    final public function getFileLink(): string
    {
        return Url::to(['site/download', 'slug' => $this->slug]);
    }

    final public function getFileAdminLink(): string
    {
        return Url::to(['../site/download', 'slug' => $this->slug], true);
    }

    final public function getFileName(): string
    {
        $file = Yii::getAlias('@file') . '/' . $this->category->slug . '/' . $this->subject->slug . '/' . date('Y_m') . '/' . $this->file;
        return basename($file);
    }

    final public function getImageFile(): string
    {
        return Yii::getAlias('@image') . '/' . $this->category->slug . '/' . $this->subject->slug . '/' . date('Y_m') . '/' . $this->image;
    }

    final public function getImageLink(): string
    {
        return Url::to(['site/image', 'slug' => $this->slug]);
    }

    final public function getImageAdminLink(): string
    {
        return Url::to(['../site/image', 'slug' => $this->slug]);
    }


    final public function saveImage(string $default = null): void
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

    public function buy(\app\models\User|\yii\web\IdentityInterface|null $user)
    {
        if ($user === null) {
            return false;
        }
        if ($user->balance < $this->price) {
            return false;
        }
        if (MyFiles::findOne(['user_id' => $user->id, 'file_id' => $this->id]) !== null) {
            return true;
        }
        $myFile = new MyFiles();
        $myFile->user_id = $user->id;
        $myFile->file_id = $this->id;
        $myFile->save();
        $user->balance -= $this->price;
        $user->save();
        $this->downloads++;
        $this->save();
        $transaction = new \common\models\Transaction();
        $transaction->from = 'admin';
        $transaction->to = (string)$user->id;
        $transaction->message = "Fayl xarid qilindi: [{$this->name}]\t\t\t";
        $transaction->cost = -$this->price;
        $transaction->time = (new \DateTime())->format('Y-m-d H:i:s');
        if ($transaction->save()) {
            Yii::$app->session->setFlash('success', 'You have successfully downloaded the file');
        } else {
            dd($transaction->errors);
        }
        return true;
    }

    final protected function getUploadTime(): string
    {
        return date('d.m.Y', strtotime($this->created_at));
    }

    final protected function getFileSize(): string
    {
        return Yii::$app->formatter->asShortSize(filesize(Yii::getAlias('@file') . '/' . $this->category->slug . '/' . $this->subject->slug . '/' . date('Y_m',strtotime($this->created_at)) . '/' . $this->file));
    }
}
