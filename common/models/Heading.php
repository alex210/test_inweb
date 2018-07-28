<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "heading".
 *
 * @property int $id
 * @property string $title
 *
 * @property BookHasHeading[] $bookHasHeadings
 */
class Heading extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'heading';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])
            ->viaTable('{{%book_has_heading}}', ['heading_id' => 'id']);
    }
}
