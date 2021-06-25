<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bron}}`.
 */
class m210624_134733_create_bron_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bron}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'email' => $this->string(),
            'bron_arrival_date' => $this->date(),
            'bron_departure_date' => $this->date(),
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
        $this->dropTable('{{%bron}}');
    }
}
