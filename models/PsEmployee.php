<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;


/**
 * This is the model class for table "ps_employee".
 *
 * @property string $id_employee
 * @property string $id_profile
 * @property string $id_lang
 * @property string $lastname
 * @property string $firstname
 * @property string $email
 * @property string $passwd
 * @property string $last_passwd_gen
 * @property string $stats_date_from
 * @property string $stats_date_to
 * @property string $stats_compare_from
 * @property string $stats_compare_to
 * @property string $stats_compare_option
 * @property string $preselect_date_range
 * @property string $bo_color
 * @property string $bo_theme
 * @property string $bo_css
 * @property string $default_tab
 * @property string $bo_width
 * @property integer $bo_menu
 * @property integer $active
 * @property integer $optin
 * @property string $id_last_order
 * @property string $id_last_customer_message
 * @property string $id_last_customer
 * @property string $last_connection_date
 */
class PsEmployee extends \yii\db\ActiveRecord implements IdentityInterface

{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ps_employee';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbsklep');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_employee', 'id_profile', 'lastname', 'firstname', 'email', 'passwd'], 'required'],
            [['id_employee', 'id_profile', 'id_lang', 'stats_compare_option', 'default_tab', 'bo_width', 'bo_menu', 'active', 'optin', 'id_last_order', 'id_last_customer_message', 'id_last_customer'], 'integer'],
            [['last_passwd_gen', 'stats_date_from', 'stats_date_to', 'stats_compare_from', 'stats_compare_to', 'last_connection_date'], 'safe'],
            [['lastname', 'firstname', 'passwd', 'preselect_date_range', 'bo_color', 'bo_theme'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 128],
            [['bo_css'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_employee' => 'Id Employee',
            'id_profile' => 'Id Profile',
            'id_lang' => 'Id Lang',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'email' => 'Email',
            'passwd' => 'Passwd',
            'last_passwd_gen' => 'Last Passwd Gen',
            'stats_date_from' => 'Stats Date From',
            'stats_date_to' => 'Stats Date To',
            'stats_compare_from' => 'Stats Compare From',
            'stats_compare_to' => 'Stats Compare To',
            'stats_compare_option' => 'Stats Compare Option',
            'preselect_date_range' => 'Preselect Date Range',
            'bo_color' => 'Bo Color',
            'bo_theme' => 'Bo Theme',
            'bo_css' => 'Bo Css',
            'default_tab' => 'Default Tab',
            'bo_width' => 'Bo Width',
            'bo_menu' => 'Bo Menu',
            'active' => 'Active',
            'optin' => 'Optin',
            'id_last_order' => 'Id Last Order',
            'id_last_customer_message' => 'Id Last Customer Message',
            'id_last_customer' => 'Id Last Customer',
            'last_connection_date' => 'Last Connection Date',
        ];
    }
    
    public function validatePassword($password)
    {
    	return $this->passwd === md5( Yii::$app->params['presta_coocie_key'].$password);
    }
    
    public function getId()
    {
    	return $this->getPrimaryKey();
    
    	//  return $this->id;
    }
    
    public function getAuthKey()
    {
    	return md5($this->email . $this->passwd); // nie ma pola authkey
    }
    
    public function validateAuthKey($authKey)
    {
    	return $this->authKey === $authKey;
    }
    
    public static function findByUsername($username)
    {
    	return static::findOne(['email' => $username]);
    }
    public static function findIdentityByAccessToken($token, $type = NULL)
    {
    	 return static::findOne(['access_token' => $token]);
    }
    
    public static function findIdentity($id)
    {
    	return PsEmployee::findOne(['id_employee'=>$id]);
    }
    
    public function getUsername(){
    	return $this->email;
    }
    
}
