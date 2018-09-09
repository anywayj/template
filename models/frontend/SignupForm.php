<?php

namespace app\models\frontend;

use app\models\db\User;
use app\validators\PasswordValidator;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    //public $verifyCode;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['username', 'filter', 'filter' => 'trim'],
            [['username','password'], 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Этот логин занят.'],
            [['username','password'], 'string', 'min' => 5, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Такая почта уже существует.'],
            ['password', 'required'],
            ['password', PasswordValidator::class],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'email' => Yii::t('common', 'Почта'),
            'password' => Yii::t('auth', 'Пароль'),
            'username' => Yii::t('auth', 'Логин'),
        ];
    }

    /**
     * Signs user up.
     * @param bool $runValidation whether to perform validation (calling [[validate()]])
     * before signup the user.
     * @return User|null the saved model or null if saving fails
     */
    public function signup($runValidation = true)
    {
        if ($runValidation && !$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->password = $this->password;
        $user->email = $this->email;
        $user->statusId = User::STATUS_ACTIVE;
        if ($user->save(false)) {
            //$user->sendNewUserEmail();
            return $user;
        }

        return null;
    }
}