<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property integer $id
 * @property string $itemname
 * @property string $itemnumber
 * @property string $category
 * @property string $suppliername
 * @property string $branch
 * @property double $cost_price
 * @property double $unit_price
 * @property double $debitstock
 * @property double $creditstock
 * @property double $quantity
 * @property double $discount_percent
 * @property double $discount_amount
 * @property double $reorder_level
 * @property integer $status
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cost_price', 'unit_price', 'debitstock', 'creditstock', 'quantity', 'discount_percent', 'discount_amount', 'reorder_level'], 'number'],
            [['status'], 'integer'],
            [['itemname', 'itemnumber', 'category', 'suppliername', 'branch'], 'string', 'max' => 150],
            [['itemname', 'category', 'branch'], 'unique', 'targetAttribute' => ['itemname', 'category', 'branch'], 'message' => 'The combination of Itemname, Category and Branch has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'itemname' => 'Itemname',
            'itemnumber' => 'Itemnumber',
            'category' => 'Category',
            'suppliername' => 'Suppliername',
            'branch' => 'Branch',
            'cost_price' => 'Cost Price',
            'unit_price' => 'Unit Price',
            'debitstock' => 'Debitstock',
            'creditstock' => 'Creditstock',
            'quantity' => 'Quantity',
            'discount_percent' => 'Discount Percent',
            'discount_amount' => 'Discount Amount',
            'reorder_level' => 'Reorder Level',
            'status' => 'Status',
        ];
    }

    /**
     * @inheritdoc
     * @return ItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ItemsQuery(get_called_class());
    }
}
