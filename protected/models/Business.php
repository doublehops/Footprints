<?php

/**
 * This is the model class for table "Business".
 */
class Business extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Business':
	 * @var integer $id
	 * @var string $businessName
	 * @var string $AssetPath
	 * @var integer $gstEnabled
	 * @var string $gstRate
	 * @var string $timeOffset
	 * @var string $created
	 * @var string $lastModified
	 * @var integer $lastUpdatedBy
	 * @var integer $active
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return Business the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Business';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('businessName, AssetPath', 'required'),
			array('gstEnabled, lastUpdatedBy, timeOffset, active', 'numerical', 'integerOnly'=>true),
			array('gstRate', 'numerical'),
			array('businessName, AssetPath', 'length', 'max'=>255),
			array('gstRate, timeOffset', 'length', 'max'=>5),
			array('created, lastModified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, businessName, AssetPath, gstEnabled, gstRate, timeOffset, created, lastModified, lastUpdatedBy, active', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'businessName' => 'Business Name',
			'AssetPath' => 'Asset Path',
			'gstEnabled' => 'Gst Enabled',
			'gstRate' => 'Gst Rate',
			'timeOffset' => 'Time Offset',
			'created' => 'Created',
			'lastModified' => 'Last Modified',
			'lastUpdatedBy' => 'Last Updated By',
			'active' => 'Active',
		);
	}

	/**
	 * Prepares attributes before performing validation.
	 */
	protected function beforeValidate()
	{

		$this->lastUpdatedBy=Yii::app()->user->id;

		if($this->isNewRecord)
		{
			$this->created=$this->lastModified=date('Y-m-d H:i:s');
		}
		else
		{
			$this->lastModified=date('Y-m-d H:i:s');
		}
		return true;
	}
	
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('businessName',$this->businessName,true);

		$criteria->compare('AssetPath',$this->AssetPath,true);

		$criteria->compare('gstEnabled',$this->gstEnabled);

		$criteria->compare('gstRate',$this->gstRate,true);

		$criteria->compare('timeOffset',$this->timeOffset,true);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('lastModified',$this->lastModified,true);

		$criteria->compare('lastUpdatedBy',$this->lastUpdatedBy);

		$criteria->compare('active',$this->active);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}