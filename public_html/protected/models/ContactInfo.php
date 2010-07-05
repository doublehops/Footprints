<?php

/**
 * This is the model class for table "ContactInfo".
 */
class ContactInfo extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'ContactInfo':
	 * @var integer $id
	 * @var integer $pId
	 * @var string $address1
	 * @var string $address2
	 * @var string $city
	 * @var string $state
	 * @var string $postcode
	 * @var string $mailAddress1
	 * @var string $MailAddress2
	 * @var string $mailCity
	 * @var string $mailState
	 * @var string $mailPostcode
	 * @var string $abn
	 * @var string $contactName
	 * @var string $contactNumber
	 * @var string $contactMobile
	 * @var string $contactFax
	 * @var string $contactEmail
	 * @var string $accountEmail
	 * @var string $notes
	 * @var string $created
	 * @var string $lastModified
	 * @var integer $lastUpdatedBy
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return ContactInfo the static model class
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
		return 'ContactInfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('pId, lastUpdatedBy', 'numerical', 'integerOnly'=>true),
			array('address1, address2, mailAddress1, MailAddress2, contactName', 'length', 'max'=>255),
			array('city, state, mailCity, mailState, contactEmail, accountEmail', 'length', 'max'=>100),
			array('postcode, mailPostcode', 'length', 'max'=>5),
			array('abn', 'length', 'max'=>20),
			array('contactNumber, contactMobile, contactFax', 'length', 'max'=>25),
			array('notes, created, lastModified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, pId, address1, address2, city, state, postcode, mailAddress1, MailAddress2, mailCity, mailState, mailPostcode, abn, contactName, contactNumber, contactMobile, contactFax, contactEmail, accountEmail, notes, created, lastModified, lastUpdatedBy', 'safe', 'on'=>'search'),
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
			'pId' => 'P',
			'address1' => 'Address1',
			'address2' => 'Address2',
			'city' => 'City',
			'state' => 'State',
			'postcode' => 'Postcode',
			'mailAddress1' => 'Mail Address1',
			'MailAddress2' => 'Mail Address2',
			'mailCity' => 'Mail City',
			'mailState' => 'Mail State',
			'mailPostcode' => 'Mail Postcode',
			'abn' => 'Abn',
			'contactName' => 'Contact Name',
			'contactNumber' => 'Contact Number',
			'contactMobile' => 'Contact Mobile',
			'contactFax' => 'Contact Fax',
			'contactEmail' => 'Contact Email',
			'accountEmail' => 'Account Email',
			'notes' => 'Notes',
			'created' => 'Created',
			'lastModified' => 'Last Modified',
			'lastUpdatedBy' => 'Last Updated By',
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

		$criteria->compare('pId',$this->pId);

		$criteria->compare('address1',$this->address1,true);

		$criteria->compare('address2',$this->address2,true);

		$criteria->compare('city',$this->city,true);

		$criteria->compare('state',$this->state,true);

		$criteria->compare('postcode',$this->postcode,true);

		$criteria->compare('mailAddress1',$this->mailAddress1,true);

		$criteria->compare('MailAddress2',$this->MailAddress2,true);

		$criteria->compare('mailCity',$this->mailCity,true);

		$criteria->compare('mailState',$this->mailState,true);

		$criteria->compare('mailPostcode',$this->mailPostcode,true);

		$criteria->compare('abn',$this->abn,true);

		$criteria->compare('contactName',$this->contactName,true);

		$criteria->compare('contactNumber',$this->contactNumber,true);

		$criteria->compare('contactMobile',$this->contactMobile,true);

		$criteria->compare('contactFax',$this->contactFax,true);

		$criteria->compare('contactEmail',$this->contactEmail,true);

		$criteria->compare('accountEmail',$this->accountEmail,true);

		$criteria->compare('notes',$this->notes,true);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('lastModified',$this->lastModified,true);

		$criteria->compare('lastUpdatedBy',$this->lastUpdatedBy);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}