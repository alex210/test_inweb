<?php

use yii\db\Migration;

/**
 * Class m180726_173206_book
 */
class m180726_173206_book extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%book}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'img' => $this->string(255),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%book_has_heading}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer(),
            'heading_id' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey(
            'FK_book_has_heading_book', '{{%book_has_heading}}', 'book_id', '{{%book}}', 'id', 'CASCADE'
        );

        $this->addForeignKey(
            'FK_book_has_heading_heading', '{{%book_has_heading}}', 'heading_id', '{{%heading}}', 'id', 'RESTRICT'
        );

        $this->createTable('{{%book_has_author}}', [
            'id' => $this->primaryKey(),
            'book_id' => $this->integer(),
            'author_id' => $this->integer(),
        ], $tableOptions);

        $this->addForeignKey(
            'FK_book_has_author_book', '{{%book_has_author}}', 'book_id', '{{%book}}', 'id', 'CASCADE'
        );

        $this->addForeignKey(
            'FK_book_has_author_author', '{{%book_has_author}}', 'author_id', '{{%author}}', 'id', 'RESTRICT'
        );
    }

    public function down()
    {
        $this->dropTable('{{%book}}');
        $this->dropTable('{{%book_has_author}}');
        $this->dropTable('{{%book_has_heading}}');
        
        return true;
    }
}
