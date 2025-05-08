<?php

use yii\db\Migration;

/**
 * Class m221204_085912_alter_pages_columns_charset
 */
class m221204_085912_alter_pages_columns_charset extends Migration
{
    public function up()
    {
        // Для MySQL меняем кодировку столбцов
        if ($this->db->driverName === 'mysql') {
            $this->execute("ALTER TABLE pages MODIFY `title` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL");
            $this->execute("ALTER TABLE pages MODIFY `content` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL");
        }
    }

    public function down()
    {
        // Откат изменений - возвращаем стандартную кодировку
        if ($this->db->driverName === 'mysql') {
            $this->execute("ALTER TABLE pages MODIFY `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL");
            $this->execute("ALTER TABLE pages MODIFY `content` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL");
        }
    }
}