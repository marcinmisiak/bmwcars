<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "samochod".
 *
 * @property integer $id
 * @property string $model
 * @property integer $pojemnosc
 * @property string $opis
 * @property string $zdjecie1
 * @property string $zdjecie2
 * @property string $zdjecie3
 * @property string $zdjecie4
 * @property string $miniatura
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
            [['model', 'pojemnosc', 'opis', 'miniatura'], 'required'],
            [['pojemnosc'], 'integer'],
            [['opis'], 'string'],
            [['model'], 'string', 'max' => 50],
            [['zdjecie1', 'zdjecie2', 'zdjecie3', 'zdjecie4', 'miniatura'], 'string', 'max' => 200],
        	[['zdjecia'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        	[['plikMiniatura'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
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
            'pojemnosc' => 'Pojemnosc',
            'opis' => 'Opis',
            'zdjecie1' => 'Zdjecie1',
            'zdjecie2' => 'Zdjecie2',
            'zdjecie3' => 'Zdjecie3',
            'zdjecie4' => 'Zdjecie4',
            'miniatura' => 'Miniatura',
        ];
    }
    
    public function upload()
    {
    //	if ($this->validate()) {
    	$this->zdjecia = UploadedFile::getInstances($this, 'zdjecia');
    	$this->plikMiniatura = UploadedFile::getInstance($this, 'plikMiniatura');
    	
    		$this->plikMiniatura->saveAs('uploads/' . $this->plikMiniatura->baseName . '.' . $this->plikMiniatura->extension);
    		$this->miniatura=$this->plikMiniatura->baseName . '.' . $this->plikMiniatura->extension;
    		 
    		$x=0;
    		foreach ($this->zdjecia as $file) {
    			$x++;
    			$poleZdjecia = 'zdjecie'.$x;
    			$file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
    			
    			$this->$poleZdjecia = $file->baseName . '.' . $file->extension;
    		}
    		
    		
    	
    		return true;
    //	} else {
    //		return false;
    //	}
    }
}
