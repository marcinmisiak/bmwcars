<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;

/**
 * This is the model class for table "samochod".
 *
 * @property integer $id
 * @property string $model
 * @property string $rocznik
 * @property integer $pojemnosc
 * @property string $cena
 * @property string $zdjecie1
 * @property string $zdjecie2
 * @property string $zdjecie3
 * @property string $zdjecie4
 * @property string $miniatura
 * @property string $opis
 */
class Samochod extends \yii\db\ActiveRecord
{
	
	public $zdjecia = [];
	public $plikMiniatura;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'samochod';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'rocznik', 'pojemnosc', 'cena', 'zdjecie1', 'miniatura', 'opis'], 'required'],
            [['rocznik'], 'safe'],
            [['pojemnosc','przebieg'], 'integer'],
            [['cena'], 'number'],
            [['opis'], 'string'],
            [['model'], 'string', 'max' => 30],
            [['zdjecie1', 'zdjecie2', 'zdjecie3', 'zdjecie4', 'miniatura'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'rocznik' => 'Rocznik',
            'pojemnosc' => 'Pojemność',
            'cena' => 'Cena',
            'zdjecie1' => 'Zdjecie1',
            'zdjecie2' => 'Zdjecie2',
            'zdjecie3' => 'Zdjecie3',
            'zdjecie4' => 'Zdjecie4',
            'miniatura' => 'Miniatura',
            'opis' => 'Opis',
        	'zdjecia'=>'Zdjęcia (min 1, max 4)'
        ];
    }
    
    public function scenarios()
    {
    	$scenarios = parent::scenarios();
    	$scenarios['update'] = ['model', 'rocznik', 'pojemnosc', 'cena', 'zdjecie1', 'miniatura', 'opis', 'zdjecie2', 'zdjecie3', 'zdjecie4','przebieg'];//Scenario Values Only Accepted
    	return $scenarios;
    }
    
    public function upload()
    {
    	// if ($this->validate()) {
    	$this->zdjecia = UploadedFile::getInstances($this, 'zdjecia');
    	$this->plikMiniatura = UploadedFile::getInstance($this, 'plikMiniatura');
    	$path = Yii::$app->basePath. DIRECTORY_SEPARATOR.'web'. DIRECTORY_SEPARATOR. 'uploads'. DIRECTORY_SEPARATOR;
    	
    	
    	if (!empty($this->plikMiniatura)) {
    		if (is_file($path.$this->miniatura)) {
    			unlink($path.$this->miniatura);
    		}
    	$this->miniatura = Yii::$app->security->generateRandomString(10).'.'.$this->plikMiniatura->extension;
    	$this->plikMiniatura->saveAs('uploads/' . $this->miniatura);
    	
    	} else if($this->scenario == 'default') {
    		$this->addError('plikMiniatura', 'Brak miniatury');
    		return false;
    	}
    	
    	
    	if(!empty($this->zdjecia)) {
    		
    	$x=0;
    	foreach ($this->zdjecia as $file) {
    		
    		$x++;
    		$poleZdjecia = 'zdjecie'.$x;
    		if (is_file($path.$this->$poleZdjecia)) {
    			unlink($path.$this->$poleZdjecia);
    		}
    		$this->$poleZdjecia = Yii::$app->security->generateRandomString(10).'.'.$file->extension;
    		$file->saveAs('uploads/' . $this->$poleZdjecia);
    		
    		//miniatury do fancybox
    	 Image::thumbnail('@webroot/uploads/'. $this->$poleZdjecia, 120, 120)
    		->save(Yii::getAlias('@webroot/uploads/thumb_'. $this->$poleZdjecia), ['quality' => 80]);
    	
    		
    	}
    	}
    	 else {
    		$this->addError('zdjecia', 'Wybierz minimum jedno zdjęcie');
    		return false;
    	}
    
    	 
    	return true;
    	//	} else {
    	//		return false;
    	//	}
    }
    
}
