<?php

namespace app\models;

use Yii;
use yii\validators\FilterValidator;
use yii\validators\StringValidator;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property int $created_at
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'created_at'], 'required'],
            [['created_at'], 'integer'],
            [['price'], 'integer', 'min' => 0, 'max' => 1000],
            [['name'], StringValidator::class, 'max' => 20],
            [['name'], FilterValidator::class, 'filter' => function ($value) {
                $value = trim($value);
                return strip_tags($value);
            }],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'price' => 'Price',
            'created_at' => 'Created At',
        ];
    }
}
