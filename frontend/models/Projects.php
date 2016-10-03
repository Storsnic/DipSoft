<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $title
 * @property string $diagram1
 * @property string $diagram2
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'title'], 'required'],
            [['user_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['diagram1'], 'string'],
            [['diagram2'], 'string'],
            [['vars'], 'string'],
            [['req'], 'string'],
            [['lang'], 'string'],
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
            'title' => 'Title',
            'diagram1' => 'Diagram1',
            'diagram2' => 'Diagram2',
            'vars' => 'System variables',
            'req' => 'System requirements',
            'lang' => 'Language',
        ];
    }
}
