<?php

/**
 * This is the model class for table "InvoicePayment".
 */
class InvoicePayment extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'InvoicePayment':
	 * @var integer $id
	 * @var integer $invoiceId
	 * @var string $amount
	 * @var integer $paymentType
	 * @var string $paymentDate
	 * @var string $notes
	 * @var integer $active
	 * @var string $created
	 * @var string $lastModified
	 * @var integer $lastUpdatedBy
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return InvoicePayment the static model class
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
		return 'InvoicePayment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoiceId, amount, paymentType', 'required'),
			array('invoiceId, paymentType, active, lastUpdatedBy', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>9),
			array('paymentDate, notes, created, lastModified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invoiceId, amount, paymentType, paymentDate, notes, active, created, lastModified, lastUpdatedBy', 'safe', 'on'=>'search'),
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
			'amount' => 'Amount',
			'paymentType' => 'Payment Type',
			'paymentDate' => 'Payment Date',
			'notes' => 'Notes',
			'active' => 'Active',
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

		$criteria->compare('invoiceId',$this->invoiceId);

		$criteria->compare('amount',$this->amount,true);

		$criteria->compare('paymentType',$this->paymentType);

		$criteria->compare('paymentDate',$this->paymentDate,true);

		$criteria->compare('notes',$this->notes,true);

		$criteria->compare('active',$this->active);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('lastModified',$this->lastModified,true);

		$criteria->compare('lastUpdatedBy',$this->lastUpdatedBy);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}