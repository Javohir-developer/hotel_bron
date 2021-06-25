<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%hotel}}`.
 */
class m210624_143326_create_hotel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%hotel}}', [
            'id' => $this->primaryKey(),
            'number_room' => $this->integer(),
            'category_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'created_at' => $this->timestamp()->Null(),
            'updated_at' => $this->timestamp()->Null(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%hotel}}');
    }
}
