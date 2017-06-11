<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "topup".
 *
 * @property integer $id
 * @property string $user_id
 * @property string $transaction_type
 * @property string $transaction_amt
 * @property string $old_balance
 * @property string $balance
 */
class Topup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'transaction_amt', 'old_balance', 'balance'], 'required'],
            [['user_id', 'transaction_type', 'transaction_amt', 'old_balance', 'balance'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'transaction_type' => 'Transaction Type',
            'transaction_amt' => 'Transaction Amt',
            'old_balance' => 'Old Balance',
            'balance' => 'Balance',
        ];
    }
}
