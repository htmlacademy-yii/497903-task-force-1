<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "replies".
 *
 * @property int $id
 * @property int $executor_id
 * @property string|null $description
 * @property int $task_id
 * @property string $dt_add
 *
 * @property Users $executor
 * @property Tasks $task
 */
class Replies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'replies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['executor_id', 'task_id'], 'required'],
            [['executor_id', 'task_id'], 'integer'],
            [['dt_add'], 'safe'],
            [['description'], 'string', 'max' => 255],
            [['executor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['executor_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tasks::className(), 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'executor_id' => 'Executor ID',
            'description' => 'Description',
            'task_id' => 'Task ID',
            'dt_add' => 'Dt Add',
        ];
    }

    /**
     * Gets query for [[Executor]].
     *
     * @return \yii\db\ActiveQuery|UsersQuery
     */
    public function getExecutor()
    {
        return $this->hasOne(Users::className(), ['id' => 'executor_id']);
    }

    /**
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery|TasksQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::className(), ['id' => 'task_id']);
    }

    /**
     * {@inheritdoc}
     * @return RepliesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RepliesQuery(get_called_class());
    }
}
