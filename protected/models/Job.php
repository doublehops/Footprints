<?php

/**
 * This is the model class for table "Job".
 */
class Job extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Job':
	 * @var integer $id
	 * @var integer $invoiceId
	 * @var string $jobName
	 * @var string $jobDescription
	 * @var integer $jobTypeId
	 * @var string $jobRate
	 * @var string $jobQuantity
	 * @var string $jobNotes
	 * @var integer $active
	 * @var string $created
	 * @var string $lastModified
	 * @var integer $lastUpdatedBy
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return Job the static model class
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
		return 'Job';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('invoiceId, jobName, jobDescription, jobTypeId, jobRate, jobQuantity', 'required'),
			array('invoiceId, jobTypeId, active, lastUpdatedBy', 'numerical', 'integerOnly'=>true),
			array('jobName', 'length', 'max'=>100),
			array('jobDescription', 'length', 'max'=>255),
			array('jobRate, jobQuantity', 'length', 'max'=>9),
			array('jobNotes, created, lastModified', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, invoiceId, jobName, jobDescription, jobTypeId, jobRate, jobQuantity, jobNotes, active, created, lastModified, lastUpdatedBy', 'safe', 'on'=>'search'),
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
			'jobName' => 'Job Name',
			'jobDescription' => 'Job Description',
			'jobTypeId' => 'Job Type',
			'jobRate' => 'Job Rate',
			'jobQuantity' => 'Job Quantity',
			'jobNotes' => 'Job Notes',
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

		// Force model to only show invoices for current business
		$criteria->alias = 'Job';
		$criteria->select = 'Job.*';
		$criteria->join='LEFT JOIN Invoice ON Invoice.id=Job.invoiceId';
		$criteria->condition='Invoice.businessId='. Yii::app()->userInfo->business;

		$criteria->compare('id',$this->id);

		$criteria->compare('invoiceId',$this->invoiceId);

		$criteria->compare('jobName',$this->jobName,true);

		$criteria->compare('jobDescription',$this->jobDescription,true);

		$criteria->compare('jobTypeId',$this->jobTypeId);

		$criteria->compare('jobRate',$this->jobRate,true);

		$criteria->compare('jobQuantity',$this->jobQuantity,true);

		$criteria->compare('jobNotes',$this->jobNotes,true);

		$criteria->compare('Job.active',$this->active);

		$criteria->compare('created',$this->created,true);

		$criteria->compare('lastModified',$this->lastModified,true);

		$criteria->compare('lastUpdatedBy',$this->lastUpdatedBy);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
