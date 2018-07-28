<?php

namespace common\models;

use Yii;
use voskobovich\linker\LinkerBehavior;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use sjaakp\illustrated\Illustrated;

/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string $title
 * @property string $img
 * @property int $created_at
 * @property int $updated_at
 *
 * @property BookHasAuthor[] $bookHasAuthors
 * @property BookHasHeading[] $bookHasHeadings
 */
class Book extends \yii\db\ActiveRecord
{
    public function behaviors(){
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            'relations' => [
                'class' => LinkerBehavior::className(),
                'relations' => [
                    'rel_author' => [
                        'authors'
                    ],
                    'rel_heading' => [
                        'headings'
                    ]
                ]
            ],
            [
                "class" => Illustrated::className(),
                "attributes" => [
                    "img" => [
                        'aspectRatio' => 0.67,
                        // 'cropSize' => 800,
                    ],
                ],
                'directory' => '@frontend/web/uploads/',
                'baseUrl' => '/uploads/',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'img'], 'string', 'max' => 255],
            [['rel_author'], 'each', 'rule' => ['integer']],
            [['rel_heading'], 'each', 'rule' => ['integer']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'img' => 'Картинка',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата изменения',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])
            ->viaTable('{{%book_has_author}}', ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHeadings()
    {
        return $this->hasMany(Heading::className(), ['id' => 'heading_id'])
            ->viaTable('{{%book_has_heading}}', ['book_id' => 'id']);
    }
}
