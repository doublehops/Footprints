<?php

/**
 * This is the model class for table "UserExtended".
 */
class UserExtended extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'UserExtended':
	 * @var integer $id
	 * @var integer $uId
	 * @var integer $currentBusinessId
	 * @var string $timeOffset
	 * @var string $lastModified
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return UserExtended the static model class
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
		return 'UserExtended';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uId, timeOffset', 'required'),
			array('uId, currentBusinessId, timeOffset', 'numerical', 'integerOnly'=>true),
			array('timeOffset', 'length', 'max'=>5),
			array('lastModified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, uId, currentBusinessId, timeOffset, lastModified', 'safe', 'on'=>'search'),
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
			'uId' => 'U',
			'currentBusinessId' => 'Current Business',
			'timeOffset' => 'Time Offset (hours)',
			'lastModified' => 'Last Modified',
		);
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

		$criteria->compare('uId',$this->uId);

		$criteria->compare('currentBusinessId',$this->currentBusinessId);

		$criteria->compare('timeOffset',$this->timeOffset,true);

		$criteria->compare('lastModified',$this->lastModified,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}