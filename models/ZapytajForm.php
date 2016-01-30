<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ZapytajForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $verifyCode;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
          //  ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
        		'name'=>'Imię i nazwisko',
        		'subject'=>'Temat',
        		'body'=>'Treść pytania',
            'verifyCode' => 'Kod weryfikacji',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
        	$this->body .= "<P>Dane komputera klienta: " . Yii::$app->request->getUserHost() . " " . Yii::$app->request->getUserIP(). " " . Yii::$app->request->getUserAgent();
         Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setHtmlBody($this->body)
                ->setTextBody($this->body)
              ->send();
        
            return true;
        }
        return false;
    }
}
