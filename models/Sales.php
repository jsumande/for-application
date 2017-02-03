<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property integer $id
 * @property string $mode
 * @property integer $customerid
 * @property string $branch
 * @property string $agent
 * @property string $username
 * @property string $date
 * @property string $soor
 * @property string $modeofpayment
 * @property double $totalcharge
 * @property double $availablepayment
 * @property double $returnpayment
 * @property double $holdpayment
 * @property double $availablebalance
 * @property double $holdbalance
 * @property string $remarks
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mode', 'modeofpayment', 'remarks'], 'string'],
            [['customerid'], 'integer'],
            [['date'], 'safe'],
            [['totalcharge', 'availablepayment', 'returnpayment', 'holdpayment', 'availablebalance', 'holdbalance'], 'number'],
            [['branch', 'agent'], 'string', 'max' => 150],
            [['username', 'soor'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mode' => 'Mode',
            'customerid' => 'Customerid',
            'branch' => 'Branch',
            'agent' => 'Agent',
            'username' => 'Username',
            'date' => 'Date',
            'soor' => 'Soor',
            'modeofpayment' => 'Modeofpayment',
            'totalcharge' => 'Totalcharge',
            'availablepayment' => 'Availablepayment',
            'returnpayment' => 'Returnpayment',
            'holdpayment' => 'Holdpayment',
            'availablebalance' => 'Availablebalance',
            'holdbalance' => 'Holdbalance',
            'remarks' => 'Remarks',
        ];
    }

    /**
     * @inheritdoc
     * @return SalesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalesQuery(get_called_class());
    }

    public static function getCustomer()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customerid']);
    }
}
