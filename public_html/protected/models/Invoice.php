<?php

/**
 * This is the model class for table "Invoice".
 */
class Invoice extends CActiveRecord
{
	const STATUS_UNPAID=0;
    const STATUS_PARTIALLY_PAID=1;
    const STATUS_PAID=2;
    
    public $invoiceTotal = 0;
    public $tax = 0;
    
	/**
	 * The followings are the available columns in table 'Invoice':
	 * @var integer $id
	 * @var integer $clientId
	 * @var string $invoiceDate
	 * @var string $dueDate
	 * @var string $invoiceTotal
	 * @var string $clientNotes
	 * @var string $invoiceNotes
	 * @var integer $status
	 * @var integer $active
	 * @var string $created
	 * @var string $lastModified
	 * @var integer $lastUpdatedBy
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return Invoice the static model class
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
		return 'Invoice';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clientId', 'required'),
			array('clientId, status, active, lastUpdatedBy', 'numerical', 'integerOnly'=>true),
			array('invoiceTotal', 'length', 'max'=>9),
			array('invoiceDate, dueDate, clientNotes, invoiceNotes', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, clientId, invoiceDate, dueDate, invoiceTotal, clientNotes, invoiceNotes, status, active, created, lastModified, lastUpdatedBy', 'safe', 'on'=>'search'),
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
		'client'=>array(self::BELONGS_TO, 'Client', 'clientId'),
		'job'=>array(self::HAS_MANY, 'Job', 'invoiceId'),
		'invoicePayment'=>array(self::HAS_MANY, 'InvoicePayment', 'invoiceId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'clientId' => 'Client',
			'invoiceDate' => 'Invoice Date',
			'dueDate' => 'Due Date',
			'invoiceTotal' => 'Invoice Total',
			'clientNotes' => 'Client Notes',
			'invoiceNotes' => 'Invoice Notes',
			'status' => 'Status',
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
	
	public function getInvoiceValues()
	{
		$invoiceArray = array();
		
		foreach( $this->job as $job )
		{
			if( $job->active == 1 )
			{
				$this->invoiceTotal += $job->jobRate * $job->jobQuantity;
			}
		}
		
		$invoiceArray['invoiceTotal'] = $this->invoiceTotal;
		
		if( Yii::app()->userInfo->gstEnabled == 1 )
		{
			$invoiceArray['Total'] = $this->invoiceTotal;
			$invoiceArray['GSTRate'] = Yii::app()->userInfo->gstRate;
			$invoiceArray['GSTTotal'] = $this->invoiceTotal - ( $this->invoiceTotal / ( 1 + ( Yii::app()->userInfo->gstRate / 100 ) ) );
			$invoiceArray['TotalEx'] = $this->invoiceTotal - $invoiceArray['GSTTotal'];
		}
		return array( $invoiceArray );
	}
	
    public function getStatusOptions()
    {
        return array(
            self::STATUS_UNPAID=>'Unpaid',
            self::STATUS_PARTIALLY_PAID=>'Partially paid',
            self::STATUS_PAID=>'Paid',
        );
    }
 
    public function getStatusText()
    {
        $options=$this->statusOptions;
        return isset($options[$this->status]) ? $options[$this->status] : "unknown ({$this->status})";
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

		// Force model to only show invoices for current business
		$criteria->alias = 'Invoice';
		$criteria->select = 'Invoice.*';
		$criteria->join='LEFT JOIN Client ON Client.id=Invoice.clientId';
		$criteria->condition='Client.businessId='. Yii::app()->userInfo->business;
			return new CActiveDataProvider('Invoice', array(
			'criteria'=>$criteria,
		));
		
		$criteria->compare('id',$this->id);

		$criteria->compare('clientId',$this->clientId);

		$criteria->compare('invoiceDate',$this->invoiceDate,true);

		$criteria->compare('dueDate',$this->dueDate,true);

		$criteria->compare('invoiceTotal',$this->invoiceTotal,true);

		$criteria->compare('clientNotes',$this->clientNotes,true);

		$criteria->compare('invoiceNotes',$this->invoiceNotes,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('active',$this->active);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('lastModified',$this->lastModified,true);

		$criteria->compare('lastUpdatedBy',$this->lastUpdatedBy);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}