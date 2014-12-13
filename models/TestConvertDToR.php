<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_convert_d_to_r".
 *
 * @property integer $id
 * @property double $d
 * @property integer $n1
 * @property integer $n2
 * @property double $final_result
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_id
 * @property integer $last_modified_by_id
 * @property integer $history_id
 * @property integer $deleted
 * @property integer $active
 */
class TestConvertDToR extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_convert_d_to_r';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['d', 'final_result'], 'number'],
            [['n1', 'n2', 'created_by_id', 'last_modified_by_id', 'history_id', 'deleted', 'active'], 'integer'],
            [['create_time', 'update_time'], 'safe']
        ];
    }

     public static function find()
    {
        return parent::find()->where(['deleted' => 0, 'active' => 1]);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            //This is a new record
            $time = date('Y-m-d H:i:s',time());
            $model = $this;
            $model->create_time = $time;
            $model->created_by_id = \Yii::$app->user->id;
            return true;
        } else {
            //This is an update
            $time = date('Y-m-d H:i:s',time());
            $model = $this;
            $model->update_time = $time;
            $model->last_modified_by_id = \Yii::$app->user->id;

            return false;
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'd' => Yii::t('app', 'D'),
            'n1' => Yii::t('app', 'N1'),
            'n2' => Yii::t('app', 'N2'),
            'final_result' => Yii::t('app', 'Final Result'),
            'create_time' => Yii::t('app', 'Create Time'),
            'update_time' => Yii::t('app', 'Update Time'),
            'created_by_id' => Yii::t('app', 'Created By ID'),
            'last_modified_by_id' => Yii::t('app', 'Last Modified By ID'),
            'history_id' => Yii::t('app', 'History ID'),
            'deleted' => Yii::t('app', 'Deleted'),
            'active' => Yii::t('app', 'Active'),
        ];
    }
}
