<?php

class InvoicePaymentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to 'column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='column2';

	private $_invoice;
	
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	protected function loadInvoice($invoiceId)
	{
		if($this->_invoice == null)
		{
			$this->_invoice=Invoice::model()->findByPk($invoiceId);
			if($this->_invoice===null)
			{
				throw new CHttpException(404, 'The requested invoice does not exist');
			}
		}
		
		return $this->_invoice;
	}
	
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'invoiceContext + create',
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
				'actions'=>array('index','view'),
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
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}
	
	public function filterInvoiceContext($filterChain)
	{
		$invoiceId = null;
		
		if(isset($_REQUEST['iid']))
		{
			$invoiceId = $_GET['iid'];
		}
		
		$this->loadInvoice($invoiceId);
		
		$filterChain->run();
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new InvoicePayment;
		
		$model->invoiceId = $this->_invoice->id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['InvoicePayment']))
		{
			$model->attributes=$_POST['InvoicePayment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		else
		{
			$model->paymentDate = date('Y-m-d');
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

		if(isset($_POST['InvoicePayment']))
		{
			$model->attributes=$_POST['InvoicePayment'];
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
			// we only allow deletion via POST request
			$this->loadModel()->delete();

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
		$dataProvider=new CActiveDataProvider('InvoicePayment', 
		    array(
                'criteria'=>array(
                    'with'=>array('invoice'),
                    'condition'=>'invoice.businessId='. Yii::app()->userInfo->business,
                ),
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
		$model=new InvoicePayment('search');
		if(isset($_GET['InvoicePayment']))
			$model->attributes=$_GET['InvoicePayment'];

		$this->render('admin',array(
			'model'=>$model,
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
				$this->_model=InvoicePayment::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');

			$this->validateAssoc($this->getAssocKey($this->_model));
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='invoice-payment-form')
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
        return $model->invoice->businessId;
	}
}
