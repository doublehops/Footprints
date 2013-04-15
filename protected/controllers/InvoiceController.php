<?php

class InvoiceController extends Controller
{
	/*
	 * Set default due date offset (in days) from current date.
	 */
	private $dueDateOffset = 14;
	
	/**
	 * @var string the default layout for the views. Defaults to 'column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='column2';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','invoiceView','invoicePdf','invoicePrint'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();

		$paymentDataProvider= new CActiveDataProvider('InvoicePayment', array(
										'criteria'=>array(
											'condition'=>'invoiceId=:invoiceId',
											'params'=>array(':invoiceId'=>$model->id),
										),
										'pagination'=>array(
											'pageSize'=>3,
										),
		));
		
		$this->render('invoiceView',array(
			'data'=>$model,
			'invoiceValues'=>$model->getInvoiceValues(),
			'paymentDataProvider'=>$paymentDataProvider,
		));
	}
	
	public function actionInvoicePrint()
	{
		$model = $this->loadModel();
		
		$this->layout = 'invoice';
		
		$this->render('invoicePrint',array(
			'data'=>$model,
			'invoiceValues'=>$model->getInvoiceValues(),
		));
	}
	
	public function actionInvoicePdf()
	{
		$model = $this->loadModel();
		
	/*	
		$this->layout = 'invoiceTables';
		$this->render('invoicePdf',array(
			'data'=>$model,
			'invoiceValues'=>$model->getInvoiceValues(),
		));
		*/
        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        $html2pdf->WriteHTML($this->renderPartial('invoicePdf', array('data'=>$model,'invoiceValues'=>$model->getInvoiceValues()), true));
        //$html2pdf->WriteHTML('<h1>Working?</h1>');
        $html2pdf->Output();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Invoice;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invoice']))
		{
			$model->attributes=$_POST['Invoice'];
			$model->businessId=Yii::app()->userInfo->business;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		else
		{
			$model->invoiceDate = date('Y-m-d');
			$model->dueDate = date('Y-m-d', time()+ $this->dueDateOffset*24*60*60);
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Invoice']))
		{
			$model->attributes=$_POST['Invoice'];

		    if($model->save())
	    	    $this->redirect(array('view','id'=>$model->id));
		
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
            $model = $this->loadModel();
			$model()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Invoice',
			array(
				'criteria'=>array(
				'with'=>array('client'),
				'condition'=>'businessId='. Yii::app()->userInfo->business
				),
				'pagination'=>array('pageSize'=>20),
			)
		);
		
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
        $criteria = new CDbCriteria;
        $criteria->order = 'id DESC';

        if(isset($_GET['client']))
            $criteria->condition = 'clientId='. (int)$_GET['client'] .' && businessId='. Yii::app()->userInfo->business;
        else
            $criteria->condition = 'active=1 && businessId='. Yii::app()->userInfo->business;

        $dataProvider = new CActiveDataProvider('Invoice', array(
                'criteria'=>$criteria,
                'pagination'=>array(
                'pageSize'=>20,
                ),
        ));

		$model=new Invoice('search');

		$this->render('admin',array(
			'model'=>$model,
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Invoice::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');

	        $this->validateAssoc($this->getAssocKey($model));
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='invoice-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /*
     *  This method returns the businessId this record is associated to
     */
	private function getAssocKey($model)
	{
        return $model->businessId;
	}
}
