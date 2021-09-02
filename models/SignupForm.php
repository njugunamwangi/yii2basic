<?php

namespace app\models;

use yii\base\Model;
use yii\helpers\VarDumper;

class SignupForm extends Model
{
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public $confirm_password;

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'username', 'password', 'confirm_password'], 'required'],
            [['username', 'password', 'confirm_password'], 'string', 'min' => 4, 'max' => 16],
            [['first_name', 'last_name'], 'string'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup() {
        $user = new User();

        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->username = $this->username;
        $user->password = \Yii::$app->security->generatePasswordHash($this->password);
        $user->auth_key = \Yii::$app->security->generateRandomString();
        $user->access_token = \Yii::$app->security->generateRandomString();

        if ($user->save()) {
            return true;
        }

        \Yii::error('This user account was not created '.VarDumper::dumpAsString($user->errors));
        return false;
    }

}