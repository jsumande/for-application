<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales_items".
 *
 * @property integer $id
 * @property integer $sales_id
 * @property string $branch
 * @property integer $items_id
 * @property string $description
 * @property double $qty
 * @property string $item_cost_price
 * @property double $item_unit_price
 * @property integer $discount_percent
 * @property double $discount_amount
 * @property double $item_totalvalue
 */
class SalesItems extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales_items';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sales_id', 'items_id', 'discount_percent'], 'integer'],
            [['qty', 'item_cost_price', 'item_unit_price', 'discount_amount', 'item_totalvalue'], 'number'],
            [['branch'], 'string', 'max' => 150],
            [['description'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sales_id' => 'Sales ID',
            'branch' => 'Branch',
            'items_id' => 'Items ID',
            'description' => 'Description',
            'qty' => 'Qty',
            'item_cost_price' => 'Item Cost Price',
            'item_unit_price' => 'Item Unit Price',
            'discount_percent' => 'Discount Percent',
            'discount_amount' => 'Discount Amount',
            'item_totalvalue' => 'Item Totalvalue',
        ];
    }

    /**
     * @inheritdoc
     * @return SalesItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalesItemsQuery(get_called_class());
    }

    public function getSales()
    {
        return $this->hasOne(Sales::className(), ['id' => 'sales_id']);
    }

    public function getItem()
    {
        return $this->hasOne(Items::className(), ['id' => 'items_id']);
    }
}
