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
	 * @var integer $subjectGST
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
			array('creditorId, expenseType, expensePaid, subjectGST, lastUpdatedBy, active', 'numerical', 'integerOnly'=>true),
			array('expenseTotal', 'numerical', 'integerOnly'=>false),
			array('expenseName', 'length', 'max'=>100),
			array('expenseTotal', 'length', 'max'=>9),
			array('expenseDescription, expensePaidDate, capitalPurchase', 'safe'),
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
		'expenseType'=>array(self::BELONGS_TO, 'ExpenseType', 'expenseType'),
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
			'subjectGST' => 'Subjected to GST',
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
	
	static function getExpenseTotals($reportableOnly)
	{
		$expenseArray = array();
		
		$expenseTotals['nonGSTTotal'] = 0;
		$expenseTotals['subjectGSTTotal'] = 0;
		$expenseTotals['totalGSTPaid'] = 0;
		$expenseTotals['capitalPurchases'] = 0;
		$expenseTotals['capitalPurchasesGST'] = 0;
		
		$criteria = $reportableOnly == 1 ? array('condition'=>"reportableExpense='1'") : '';
		$expenseTypes=ExpenseType::model()->findAll($criteria);

		foreach($expenseTypes as $expenseType)
		{
			$expenseArray[$expenseType->id]['name'] = $expenseType->expenseName;
			$expenseArray[$expenseType->id]['total'] = 0;
			$expenseArray[$expenseType->id]['subjectGST'] = 0;
			$expenseArray[$expenseType->id]['nonGST'] = 0;
			$expenseArray[$expenseType->id]['class'] = $expenseType->reportableExpense == 1 ? '' : 'non-reportable';
		}

		$criteria = new CDbCriteria();
        $criteria->alias = 'e';
        $criteria->join = 'LEFT JOIN ExpenseType et on et.id=e.expenseType';

		$criteria->condition = 'e.expensePaid = 1 AND e.active = 1';
		if($reportableOnly == 1)
		    $criteria->condition .= ' AND et.reportableExpense = 1';

		if(isset($_POST['BasPeriod']))
		{
			$period = BasPeriod::Model()->findByPk($_POST['BasPeriod']['title']);
			
			$criteria->condition .= ' AND expensePaidDate >= \''. $period->periodStart .'\''.
									' AND expensePaidDate <= \''. $period->periodEnd .'\'';
		}
		$expenses = Expense::model()->findAll($criteria);
		
		foreach($expenses as $expense)
		{
			$expenseArray[$expense->expenseType]['total'] += $expense->expenseTotal;
			
			// Split Expense up into non GST and subject to GST
			if($expense->subjectGST == 1)
			{
				$expenseArray[$expense->expenseType]['subjectGST'] += $expense->expenseTotal;
				$expenseTotals['subjectGSTTotal'] += $expense->expenseTotal;
				if($expense->capitalPurchase == 1) 
				{
                    $expenseTotals['capitalPurchases'] += $expense->expenseTotal / ((Yii::app()->userInfo->gstRate / 100) + 1 );
    				$expenseTotals['capitalPurchasesGST'] += $expense->expenseTotal;
    			}
			}
			else
			{
				$expenseArray[$expense->expenseType]['nonGST'] += $expense->expenseTotal;
				$expenseTotals['nonGSTTotal'] += $expense->expenseTotal;
				if($expense->capitalPurchase == 1) 
				{
				    $expenseTotals['capitalPurchases'] += $expense->expenseTotal;
    				$expenseTotals['capitalPurchasesGST'] += $expense->expenseTotal;
    			}
			}
		}
		
		$expenseTotals['expenseTotal'] = $expenseTotals['subjectGSTTotal'] + $expenseTotals['nonGSTTotal'];
		$expenseTotals['totalGSTPaid'] = $expenseTotals['subjectGSTTotal'] - $expenseTotals['subjectGSTTotal'] / ((Yii::app()->userInfo->gstRate / 100) +1);
		
		return array('expenseArray'=>$expenseArray, 'expenseTotals'=>$expenseTotals);
	}
			
    static function getStatusOptions()
    {
        return array(
            self::STATUS_UNPAID=>'Unpaid',
            self::STATUS_PAID=>'Paid',
        );
    }
 
    static function getStatusText($expensePaid)
    {
        $options=self::getStatusOptions();

        return $options[$expensePaid];
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
		$criteria->alias = 'Expense';
		$criteria->select = 'Expense.*';
		$criteria->join='LEFT JOIN Creditor ON Creditor.id=Expense.creditorId';
		$criteria->condition='Creditor.businessId='. Yii::app()->userInfo->business;

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

		$criteria->compare('Expense.active',$this->active);
		
		$criteria->order = "id DESC";
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
    
    static function getExpenseType($id, $length='short')
    {
        $expenseType = ExpenseType::model()->findByPk($id);

        if($length == 'full')
            return '<span title="'. $expenseType->expenseName .'">'. $expenseType->expenseName .'</span>';

        else
        return '<span title="'. $expenseType->expenseName .'">'. substr($expenseType->expenseName, 0, 10) .'..</span>';
    }
}
