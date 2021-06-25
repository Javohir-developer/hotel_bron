<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hotel".
 *
 * @property int $id
 * @property string|null $number_room
 * @property int|null $category_id
 * @property int $status
 * @property string $created_at
 * @property string $updated_at
 */
class Hotel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hotel';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number_room','category_id', 'status'], 'required'],
            [['number_room','category_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number_room' => 'Номер Комната',
            'category_id' => 'Категория',
            'status' => 'Статус',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::class, ['id'=>'category_id']);
    }
}
