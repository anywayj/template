<?php

namespace app\models\db;

use Yii;

/**
 * User model
 *
 * @property UserAuthLog[] $authLogs
 */
class User extends Identity
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            // add extra validation here
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            // add extra labels here
        ]);
    }

    // Relations :

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthLogs()
    {
        return $this->hasMany(UserAuthLog::class, ['userId' => 'id']);
    }

    // Logic :

    /**
     * Sends email notification about account creation.
     * @return bool success.
     */
    public function sendNewUserEmail()
    {
        return Yii::$app->mailer->compose('newUser', ['user' => $this])
            ->setTo($this->email)
            ->setFrom([Yii::$app->params['appEmail'] => Yii::$app->name])
            ->setSubject(Yii::t('user', 'Your account at {appName}', ['appName' => Yii::$app->name]))
            ->send();
    }

    /**
     * {@inheritdoc}
     */
    public function sendSuspendEmail()
    {
        return Yii::$app->mailer->compose('suspendUser', ['admin' => $this])
            ->setTo($this->email)
            ->setFrom([Yii::$app->params['appEmail'] => Yii::$app->name])
            ->setSubject(Yii::t('auth', 'Your account at {appName} has been suspended', ['appName' => Yii::$app->name]))
            ->send();
    }
    
    public function getRecordusers()
    {
        return $this->hasOne(RecordUser::className(), ['id' => 'id']);
    }


}
