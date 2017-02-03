<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property integer $id
 * @property string $customername
 * @property string $emailaddress
 * @property string $address
 * @property string $phonenumber
 * @property string $branch
 * @property string $agent
 * @property double $totalcharge
 * @property double $availablepayment
 * @property double $returnpayment
 * @property double $holdpayment
 * @property double $availablebalance
 * @property double $holdbalance
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['totalcharge', 'availablepayment', 'returnpayment', 'holdpayment', 'availablebalance', 'holdbalance'], 'number'],
            [['customername', 'emailaddress', 'address', 'phonenumber', 'branch', 'agent'], 'string', 'max' => 150],
            [['customername', 'branch'], 'unique', 'targetAttribute' => ['customername', 'branch'], 'message' => 'The combination of Customername and Branch has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customername' => 'Customername',
            'emailaddress' => 'Emailaddress',
            'address' => 'Address',
            'phonenumber' => 'Phonenumber',
            'branch' => 'Branch',
            'agent' => 'Agent',
            'totalcharge' => 'Totalcharge',
            'availablepayment' => 'Availablepayment',
            'returnpayment' => 'Returnpayment',
            'holdpayment' => 'Holdpayment',
            'availablebalance' => 'Availablebalance',
            'holdbalance' => 'Holdbalance',
        ];
    }

    /**
     * @inheritdoc
     * @return CustomersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CustomersQuery(get_called_class());
    }
}
