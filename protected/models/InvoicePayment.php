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
	 * @var integer $paymentMethod
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
			array('invoiceId, amount, paymentMethod', 'required'),
			array('invoiceId, paymentMethod, active, lastUpdatedBy', 'numerical', 'integerOnly'=>true),
			array('amount', 'length', 'max'=>9),
			array('paymentDate, notes, created, lastModified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invoiceId, amount, paymentMethod, paymentDate, notes, active, created, lastModified, lastUpdatedBy', 'safe', 'on'=>'search'),
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
		    'invoice'=>array(self::BELONGS_TO, 'Invoice', 'invoiceId'),
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
			'paymentMethod' => 'Payment Method',
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

		$criteria->alias = 'ip';
		$criteria->select = 'ip.*';
		$criteria->join='LEFT JOIN Invoice i ON i.id=ip.invoiceId';
		$criteria->condition = 'i.businessId='. Yii::app()->userInfo->business;

		$criteria->compare('id',$this->id);

		$criteria->compare('invoiceId',$this->invoiceId);

		$criteria->compare('amount',$this->amount,true);

		$criteria->compare('paymentMethod',$this->paymentMethod);

		$criteria->compare('paymentDate',$this->paymentDate,true);

		$criteria->compare('notes',$this->notes,true);

		$criteria->compare('ip.active',$this->active);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('lastModified',$this->lastModified,true);

		$criteria->compare('lastUpdatedBy',$this->lastUpdatedBy);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	static function getPaymentTotals()
	{
	    $paymentArray = array();
	    $paymentArray['total'] = 0;

		$criteria = new CDbCriteria();

		if(isset($_POST['BasPeriod']))
		{
			$period = BasPeriod::Model()->findByPk($_POST['BasPeriod']['title']);
			
			$criteria->condition = ' paymentDate >= \''. $period->periodStart .'\''.
									' AND paymentDate <= \''. $period->periodEnd .'\''.
									' AND active = \'1\'';
		}

		$payments = InvoicePayment::model()->findAll($criteria);

		foreach($payments as $payment)
		{
            $paymentArray['total'] += $payment->amount;
		}

        $paymentArray['GSTReceived'] = $paymentArray['total'] - $paymentArray['total'] / ((Yii::app()->userInfo->gstRate / 100) +1);
        $paymentArray['totalEx'] = $paymentArray['total'] - $paymentArray['GSTReceived'];
        $paymentArray['payments'] = $payments;

		return $paymentArray;
	}
}
