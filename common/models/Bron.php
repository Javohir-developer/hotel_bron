<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bron".
 *
 * @property int $id
 * @property string|null $category_id
 * @property string|null $email
 * @property string|null $bron_arrival_date
 * @property string|null $bron_departure_date
 * @property int $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Bron extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bron';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'category_id', 'bron_arrival_date', 'email', 'bron_departure_date'], 'required'],
            [['status', 'category_id'], 'integer'],
            [['bron_arrival_date', 'bron_departure_date', 'created_at', 'updated_at'], 'safe'],
            [['email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер брони',
            'category_id' => 'Имя',
            'email' => 'Email',
            'bron_arrival_date' => 'Дата прибытия брони',
            'bron_departure_date' => 'Дата отъезда брони',
            'status' => 'Статус',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getCategory(){
        return $this->hasOne(Category::class, ['id'=>'category_id']);
    }

    public function getDrop(){
        $array = array();
        foreach (Category::find()->where(['status'=>1])->all() as $category){
            $count = Hotel::find()->where(['category_id'=>$category->id])->andWhere(['status'=>1])->count();
            $array += [$category->id => $category->name.' ('.$count.')'];
        }
        return $array;
    }

    public function savev1(){
        if ($this->validate()){
            if ($this->save(false)){
                $status = Hotel::find()->where(['category_id'=>$this->category_id])->andWhere(['status'=>1])->one();
                if (!empty($status)){
                    $status->status = 0;
                    $status->save(false);
                    return true;
                }
            }
        }
    }
}
