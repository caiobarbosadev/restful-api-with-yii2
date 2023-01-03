<?php

namespace app\models;

use yii\db\ActiveRecord;

// configure here
class User extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['document', 'gender'], 'string', 'max' => 45],
            [['name', 'address'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document' => 'Document',
            'name' => 'Name',
            'address' => 'Address',
            'gender' => 'Gender',
        ];
    }

    // configure here
    public function fields()
    {
        return [
            //'id', this attribute will not appear in the response
            'document',
            'name',
            'address',
            'gender'
        ];
    }
}
