<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m221204_085911_create_pages_table extends Migration
{
    public function up()
    {
        $this->createTable(
            'pages',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string()->notNull(),
                'url' => $this->string()->notNull(),
                'content' => $this->text()->notNull(),
                'create_at' => $this->timestamp()->notNull(),
            ]
        );
        
        // creates index for column `key`
        $this->createIndex(
            'idx-pages-url',
            'pages',
            'url'
        );
    }

    public function down()
    {
        $this->dropTable('pages');
    }
}
