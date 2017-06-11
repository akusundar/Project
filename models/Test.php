<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test".
 *
 * @property string $id
 * @property string $module
 * @property string $model
 */
class Test extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['module', 'model'], 'required'],
            [['module', 'model'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'module' => 'Module',
            'model' => 'Model',
        ];
    }
}
