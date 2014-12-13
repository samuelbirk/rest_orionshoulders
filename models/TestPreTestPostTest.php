<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "test_pre_test_post_test".
 *
 * @property integer $id
 * @property double $post_mean
 * @property integer $post_n
 * @property double $post_sd
 * @property double $pre_mean
 * @property integer $pre_n
 * @property double $pre_sd
 * @property double $pooled_sample_sd
 * @property double $final_result
 * @property string $create_time
 * @property string $update_time
 * @property integer $created_by_id
 * @property integer $last_modified_by_id
 * @property integer $history_id
 * @property integer $deleted
 * @property integer $active
 */
class TestPreTestPostTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'test_pre_test_post_test';
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
    public function rules()
    {
        return [
            [['post_mean', 'post_sd', 'pre_mean', 'pre_sd', 'pooled_sample_sd', 'final_result'], 'number'],
            [['post_n', 'pre_n', 'created_by_id', 'last_modified_by_id', 'history_id', 'deleted', 'active'], 'integer'],
            [['create_time', 'update_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_mean' => Yii::t('app', 'Post Mean'),
            'post_n' => Yii::t('app', 'Post N'),
            'post_sd' => Yii::t('app', 'Post Sd'),
            'pre_mean' => Yii::t('app', 'Pre Mean'),
            'pre_n' => Yii::t('app', 'Pre N'),
            'pre_sd' => Yii::t('app', 'Pre Sd'),
            'pooled_sample_sd' => Yii::t('app', 'Pooled Sample Sd'),
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
