<?php
namespace frontend\models;

use common\models\Client;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $mail;
    public $password;
    public $type;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            ['mail', 'trim'],
            ['mail', 'required'],
            ['mail', 'string', 'max' => 255],
            ['mail', 'email'],
            ['mail', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['type', 'required'],
            ['type', 'integer'],
        ];
    }

    /**
     * @return bool|null
     * @throws \yii\base\Exception
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $client = new Client();
        $user->username = $this->mail;
        $user->mail = $this->mail;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $user->save() && $this->sendEmail($user);
        $client->user_id = $user->id;
        $client->type = $this->type;
        return $client->save();

    }

    /**
     * @param $user
     * @return bool
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->mail)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'type' => 'Тип клиента'
        ];
    }


}
