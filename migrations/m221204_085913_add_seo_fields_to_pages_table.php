<?php

use yii\db\Migration;

/**
 * Class m221204_085913_add_seo_fields_to_pages_table
 */
class m221204_085913_add_seo_fields_to_pages_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('pages', 'meta_title', $this->string(200));
        $this->addColumn('pages', 'meta_description', $this->string(200));
        $this->addColumn('pages', 'meta_keywords', $this->string(255));
        $this->addColumn('pages', 'og_title', $this->string(200));
        $this->addColumn('pages', 'og_description', $this->string(200));
        $this->addColumn('pages', 'og_image', $this->string(255));
    }

    public function safeDown()
    {
        $this->dropColumn('pages', 'meta_title');
        $this->dropColumn('pages', 'meta_description');
        $this->dropColumn('pages', 'meta_keywords');
        $this->dropColumn('pages', 'og_title');
        $this->dropColumn('pages', 'og_description');
        $this->dropColumn('pages', 'og_image');
    }
}