<?php

/**
 * This is the model class for table "InvoiceSent".
 */
class InvoiceSent extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'InvoiceSent':
	 * @var integer $id
	 * @var integer $invoiceId
	 * @var string $method
	 * @var string $sentTime
	 * @var string $sentTo
	 * @var string $notes
	 * @var integer $active
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return InvoiceSent the static model class
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
		return 'InvoiceSent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoiceId, method', 'required'),
			array('invoiceId, active', 'numerical', 'integerOnly'=>true),
			array('method', 'length', 'max'=>20),
			array('sentTo', 'length', 'max'=>255),
			array('sentTime, notes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invoiceId, method, sentTime, sentTo, notes, active', 'safe', 'on'=>'search'),
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
			'invoiceId' => 'Invoice',
			'method' => 'Method',
			'sentTime' => 'Sent Time',
			'sentTo' => 'Sent To',
			'notes' => 'Notes',
			'active' => 'Active',
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

		$criteria->compare('invoiceId',$this->invoiceId);

		$criteria->compare('method',$this->method,true);

		$criteria->compare('sentTime',$this->sentTime,true);

		$criteria->compare('sentTo',$this->sentTo,true);

		$criteria->compare('notes',$this->notes,true);

		$criteria->compare('active',$this->active);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}