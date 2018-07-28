<?php

use yii\db\Migration;

/**
 * Class m180726_173030_heading
 */
class m180726_173030_heading extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%heading}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%heading}}');
        
        return true;
    }
}
