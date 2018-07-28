<?php

use yii\db\Migration;

/**
 * Class m180726_172803_author
 */
class m180726_172803_author extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%author}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
        ], $tableOptions); 
    }

    public function down()
    {
        $this->dropTable('{{%author}}');
        
        return true;
    }
}
