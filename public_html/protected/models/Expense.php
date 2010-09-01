<?php

/**
 * This is the model class for table "Expense".
 */
class Expense extends CActiveRecord
{
	const STATUS_UNPAID=0;
    const STATUS_PAID=1;
    
	/**
	 * The followings are the available columns in table 'Expense':
	 * @var integer $id
	 * @var integer $creditorId
	 * @var string $expenseName
	 * @var string $expenseDescription
	 * @var string $expenseType
	 * @var string $expenseTotal
	 * @var integer $expensePaid
	 * @var string $expensePaidDate
	 * @var string $created
	 * @var string $lastModified
	 * @var integer $lastUpdatedBy
	 * @var integer $active
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return Expense the static model class
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
		return 'Expense';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('creditorId, expenseName, expenseType, expenseTotal', 'required'),
			array('creditorId, expenseType, expensePaid, lastUpdatedBy, active', 'numerical', 'integerOnly'=>true),
			array('expenseTotal', 'numerical', 'integerOnly'=>false),
			array('expenseName', 'length', 'max'=>100),
			array('expenseTotal', 'length', 'max'=>9),
			array('expenseDescription, created, lastModified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, creditorId, expenseName, expenseDescription, expenseTotal, expensePaid, expensePaidDate, created, lastModified, lastUpdatedBy, active', 'safe', 'on'=>'search'),
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
		'creditor'=>array(self::BELONGS_TO, 'Creditor', 'creditorId'),
		'expense'=>array(self::BELONGS_TO, 'Expense', 'expenseType'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'creditorId' => 'Creditor',
			'expenseName' => 'Expense Name',
			'expenseDescription' => 'Expense Description',
			'expenseType' => 'Expense Type',
			'expenseTotal' => 'Expense Total',
			'expensePaid' => 'Expense Paid',
			'expensePaidDate' => 'Expense Paid Date',
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
			
    public function getStatusOptions()
    {
        return array(
            self::STATUS_UNPAID=>'Unpaid',
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

		$criteria->compare('id',$this->id);

		$criteria->compare('creditorId',$this->creditorId);

		$criteria->compare('expenseName',$this->expenseName,true);

		$criteria->compare('expenseDescription',$this->expenseDescription,true);

		$criteria->compare('expenseType',$this->expenseType,true);

		$criteria->compare('expenseTotal',$this->expenseTotal,true);

		$criteria->compare('expensePaid',$this->expensePaid);

		$criteria->compare('expensePaidDate',$this->expensePaidDate,true);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('lastModified',$this->lastModified,true);

		$criteria->compare('lastUpdatedBy',$this->lastUpdatedBy);

		$criteria->compare('active',$this->active);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}