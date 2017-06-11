<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "file".
 *
 * @property integer $id
 * @property integer $file
 * @property integer $type
 */
class File extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file';
    }
public $file1;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'file'], 'required'],
            [[ 'type','user_id','pages'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'File',
            'type' => 'Type',
			'pages' => 'Pages'
        ];
    }
}
